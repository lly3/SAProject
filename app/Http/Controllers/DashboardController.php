<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $posts = Post::sortable()->paginate(10);
        return view('dashboard', compact('posts'));
    }

    public function filterPost(Request $request) {
        $posts = Post::sortable()->where('organization_id', $request->input('select'))->paginate(10);
        return view('dashboard', compact('posts'));
    }
}
