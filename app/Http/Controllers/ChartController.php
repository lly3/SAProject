<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Carbon;

class ChartController extends Controller
{
    public function index()
    {
        // post where timestamp is in this month
        $posts = Post::whereMonth('created_at', Carbon::now()->month)->get();
//        // tags name where post is in this month
//        $tags = Tag::where('posts', function($query) {
//            $query->whereMonth('created_at', Carbon::now()->month);
//        });
//
//        // tags where timestamp of post is in this month
//        $tags = Tag::whereBelongto('posts', function($query) {
//            $query->whereMonth('created_at', Carbon::now()->month);
//        });

//        dd($posts);

        // array of tags
        $tag_names = [];
        $tag_count = [];
//        foreach ($tags as $tag) {
//            array_push($tag_names, $tag->name);
//            array_push($tag_count, $tag->posts()->count());
//            $tag->posts = $tag->posts->count();
//        }
        foreach ($posts as $post) {
            foreach ($post->tags as $tag) {
                if (!in_array($tag->name, $tag_names)) {
                    array_push($tag_names, $tag->name);
                    array_push($tag_count, $tag->posts()->count());
                }
            }
        }

        $organizations_names = [];
        $organizations_count = [];

        foreach ($posts as $post) {
            if (!in_array($post->organization->name, $organizations_names)) {
                array_push($organizations_names, $post->organization->name);
                array_push($organizations_count, $post->organization->posts()->count());
            }
        }

        $posts_status = ['WAIT', 'PROCESS', 'FINISH'];
        $wait_status = Post::where('status', 'WAIT')->count();
        $process_status = Post::where('status', 'PROCESS')->count();
        $finish_status = Post::where('status', 'FINISH')->count();
        $posts_status_count = [$wait_status, $process_status, $finish_status];



//        dd ($posts_status, $posts_status_count);
        // print tag_names and tag_count
//         dd($tag_names, $tag_count);
        return view("charts.index",
            [   'tag_names' => $tag_names,
                'tag_count' => $tag_count,
                'organizations_names' => $organizations_names,
                'organizations_count' => $organizations_count,
                'posts_status' => $posts_status,
                'posts_status_count' => $posts_status_count
            ]);
    }
}
