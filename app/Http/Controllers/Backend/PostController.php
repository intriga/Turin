<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
            ->paginate(10);
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->content = $request->input('content');

        if ($request->allFiles('image')) {     
            $fileName = $request->file('image')->hashName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $post["image"] = '/storage/'.$path;
        }

        $post->save();

        return redirect('/dashboard/posts');
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
        $post = Post::where('id', $id)->first();
        return view('backend.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        
        $post->image = $request->input('image');
        $post->old_image = $request->input('old_image');
        $post->content = $request->input('content');
        
        //dd($request->all());

        $image = $post->old_image = $request->input('old_image');

        if ($request->allFiles('image') && $post->old_image == null) {
            !is_null($image) && Storage::delete($image);
            $fileName = $request->file('image')->hashName();
            $files = $request->file('image')->storeAs('images', $fileName, 'public');
            $post["image"] = '/storage/'.$files;           
            
            $post->save();

        }elseif ($request->allFiles('image')) {

            !is_null($image) && Storage::delete($image);
            unlink(storage_path('app/public/images' . substr($image, 15) ));
            $fileName = $request->file('image')->hashName();
            $files = $request->file('image')->storeAs('images', $fileName, 'public');
            $post["image"] = '/storage/'.$files;            
            
            $post->save();

        }else{
            $post->image = $post->old_image;
            $post->save();
        }

        return redirect('/dashboard/posts/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if ($post->image) {
            $image = $post->image;
            unlink(storage_path('app/public/images' . substr($image, 15) ));            
            $post->delete();
        }else{
            $post->delete();
        }
        
        return redirect('/dashboard/posts');
    }
}
