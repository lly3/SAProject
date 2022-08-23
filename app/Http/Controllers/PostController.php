<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Organization;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'searchByTitle']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(50);
        return view("posts.index", ['posts' => $posts]);
    }

    // display a listing of your posts
    public function my_posts()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->paginate(50);
        return view("posts.my_posts", ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
//        $post->user_id = Auth::user()->id;
        $post->user_id = $request->user()->id;

        if($request->input('penname') != null)
            $post->penname = $request->input('penname');

        if($request->input('contact') != null)
            $post->contact = $request->input('contact');

        $post->organization_id = $request->input('select');
        $post->save();

        $tags = $request->get('tags');
        $tag_ids = $this->syncTags($tags);
        $post->tags()->sync($tag_ids);

        if($request->hasFile('images')) {
            foreach ($request->file('images') as $imagefile) {
                $image = new Image();
                $filename = date('YmdHi').$imagefile->getClientOriginalName();
                $imagefile->move(public_path().'/images/', $filename);
                $image->url = $filename;
                $image->post_id = $post->id;
                $image->save();

                $post->images()->save($image);
            }
        }

        return redirect()->route('posts.show', ['post' => $post->id]);
        //                     -------------------------^
        //                    |
        // GET|HEAD  posts/{post} ......... posts.show › PostController@show
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)    // Dependency Injection
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $tags = implode(', ', $post->tags->pluck('name')->all());

        return view('posts.edit', ['post' => $post, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'description' => ['required', 'max:1000'],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        ]);

        $post->title = $request->input('title');
        $post->description = $request->input('description');

        if($request->input('penname') != null)
            $post->penname = $request->input('penname');
        else
            $post->penname = 'ไม่ประสงค์ออกนาม';

        if($request->input('contact') != null)
            $post->contact = $request->input('contact');
        else
            $post->contact = 'ไม่มีข้อมูล';

        $post->organization_id = $request->input('select');
        $post->save();

        $tags = $request->get('tags');
        $tag_ids = $this->syncTags($tags);
        $post->tags()->sync($tag_ids);

        if($request->hasFile('images')) {
            $this->deleteImages($post);

            foreach ($request->file('images') as $imagefile) {
                $image = new Image();
                $filename = date('YmdHi').$imagefile->getClientOriginalName();
                $imagefile->move(public_path().'/images/', $filename);
                $image->url = $filename;
                $image->post_id = $post->id;
                $image->save();

                $post->images()->save($image);
            }
        }

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    private function syncTags($tags)
    {
        $tags = explode(',', $tags);
        $tags = array_map(function($v) {
            // use Illuminate\Support\Str; ก่อน class
            return Str::ucfirst(trim($v));
        }, $tags);

        $tag_ids = [];
        foreach($tags as $tag_name) {
            $tag = Tag::where('name', $tag_name)->first();
            if (!$tag) {
                $tag = new Tag();
                $tag->name = $tag_name;
                $tag->save();
            }
            $tag_ids[] = $tag->id;
        }
        return $tag_ids;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        $this->authorize('delete', $post);

        $title = $request->input('title');
        if ($title == $post->title) {
            $this->deleteImages($post);
            $post->delete();
            return redirect()->route('posts.index');
        }

        return redirect()->back();
    }

    public function storeComment(Request $request, Post $post)
    {
        $comment = new Comment();
        $comment->message = $request->get('message');
        $comment->user_id = $request->user()->id;
        $post->comments()->save($comment);
        return redirect()->route('posts.admin.edit', ['post' => $post->id]);
    }

    public function adminEdit(Request $request, Post $post) {
        $this->authorize('viewEditAdmin', $post);

        return view('posts.admin_edit', ['post' => $post]);
    }

    public function updateStatus(Request $request, Post $post) {
        $this->authorize('updateStatus', $post);

        if($post->status == 'WAIT')
            $post->status = 'PROCESS';
        else if($post->status == 'PROCESS')
            $post->status = 'FINISH';
        $post->save();

        return redirect()->route('posts.admin.edit', ['post' => $post->id]);
    }

    public function deleteAllImages(Post $post) {
        $this->authorize('update', $post);

        $this->deleteImages($post);

        return redirect()->route('posts.edit', ['post' => $post->id]);
    }

    private function deleteImages($post) {
        foreach($post->images as $image) {
            File::delete('images/'.$image->url);
        }
        $post->images()->delete();
    }

    public function deleteAdmin(Post $post) {
        $this->authorize('delete', $post);

        $this->deleteImages($post);
        $post->delete();

        return redirect()->back();
    }

    // search post by title
    public function searchByTitle(Request $request) {
        $search = $request->input('search');
        $posts = Post::where('title', 'like', '%'.$search.'%')->get();
        return view('posts.index', ['posts' => $posts, 'search' => $search]);
    }
}
