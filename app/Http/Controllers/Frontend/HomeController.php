<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
            ->paginate(5);
        return view('frontend.index', compact('posts'));
    }

    public function show(string $id)
    {
        $post = Post::find($id);
        return view('frontend.show', compact('post'));
    }
}
