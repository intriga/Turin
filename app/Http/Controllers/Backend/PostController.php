<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category', 'user')->get();
        // dd($posts);
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->can('create')) {
            $categories = Category::select('id', 'title')
                ->latest()        
                ->get();
        } else {
            abort(403, 'forbidden access to this resource'); // This will show the default 403 error page
        }
        //dd($categories);
        return view('backend.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category');
        $post->content = $request->input('content');
        $post->user_id = Auth::id(); // Associate the post with the currently authenticated user

           // Handle image upload
        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->hashName();
            $request->file('image')->move(public_path('images'), $fileName); // Move the file
            $post->image = '/images/' . $fileName; // Set the image path
        }

        $post->save();

        return redirect('/dashboard/posts')->with('info', 'Your file has been deleted.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // $post = Post::find($id);
        $post = Post::where('slug', $slug)->first();
        return view('backend.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->can('create')) {            
            $post = Post::where('id', $id)->first();
            $categories = Category::get();
        } else {
            abort(403, 'forbidden access to this resource'); // This will show the default 403 error page
        }

        // dd($post);
        return view('backend.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
    
        $post = Post::find($id);

        // Update the post fields
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if (File::exists(public_path($post->image))) {
                File::delete(public_path($post->image));
            }

            // Move the new image
            $image = $request->file('image');
            $fileName = $image->hashName();
            $imagePath = '/images/' . $fileName;
            $image->move(public_path('images'), $fileName);

            // Set the new image path
            $post->image = $imagePath;
        }
        //dd($post);

        // Save the updated post
        $post->save();

        return redirect('/dashboard/posts/')->with('success', 'Your file has been updated.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->can('create')) {
            $post = Post::find($id);

            if ($post->image) {
                $imagePath = public_path($post->image); // Get the absolute path to the image        
                if (File::exists($imagePath)) {
                    File::delete($imagePath); // Delete the file using Laravel's File facade
                }        
                $post->delete();
            } else {
                $post->delete();
            }
        } else {
            abort(403, 'forbidden access to this resource'); // This will show the default 403 error page
        }
        
        return redirect()->route('posts')->with('danger', 'Your file has been deleted.');
    }
}
