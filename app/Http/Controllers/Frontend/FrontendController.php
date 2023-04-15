<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.title AS category_title', 'categories.slug AS category_slug')
            ->orderBy('id', 'desc')
            ->paginate(5);
        
        // dd($posts);
        return view('frontend.index', compact('posts', 'categories'));
    }

    public function show(string $slug)
    {
        // $post = Post::find($id);
        $categories = Category::orderBy('id', 'desc')->get();
        $post = Post::where('slug', $slug)->first();
        return view('frontend.show', compact('post', 'categories'));
    }

    public function category($slug)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $category = Category::where('slug', $slug)
                  ->pluck('id')
                  ->first();

        $posts = Post::where('category_id', $category)
               ->orderBy('id', 'desc')->paginate(5);
        // dd($category);
        return view('frontend.index', compact('posts', 'categories'));
    }
}
