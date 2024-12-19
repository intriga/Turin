<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')
            ->paginate(10);
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->can('create')) {
            return view('backend.category.create');
        } else {
            abort(403, 'forbidden access to this resource'); // This will show the default 403 error page
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->title = $request->input('title');
        $category->slug = $request->input('slug');

        $category->save();

        return redirect('/dashboard/categories')->with('info', 'Your file has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->can('create')) {
            $category = Category::where('id', $id)->first();
            return view('backend.category.edit', compact('category'));
        } else {
            abort(403, 'forbidden access to this resource'); // This will show the default 403 error page
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);

        $category->title = $request->input('title');
        $category->slug = $request->input('slug');
                
        $category->save();

        return redirect('/dashboard/categories/')->with('success', 'Your category has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->can('create')) {
            $category = Category::find($id);
            $category->delete();
            
            return redirect('/dashboard/categories')->with('danger', 'Your category has been deleted.');
        } else {
            abort(403, 'forbidden access to this resource'); // This will show the default 403 error page
        }
    }
}
