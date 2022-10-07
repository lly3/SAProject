<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $orders = Order::sortable()->paginate(10);
        return view('dashboard', compact('orders'));
    }

    public function filterPost(Request $request) {
        $posts = Post::sortable()->where('organization_id', $request->input('select'))->paginate(10);
        return view('dashboard', compact('posts'));
    }
}
