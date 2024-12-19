<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->can('view users')) {
            $users = User::get();
            // dd($users);
            return view('backend.user.index', compact('users'));
        } else {
            // Return a JSON response with a 403 status code if unauthorized
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->can('view users')) {
            return view('backend.user.create');
        } else {
            // Return a JSON response with a 403 status code if unauthorized
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); // Hash the password before saving

        $user->save();

        return redirect('/dashboard/users')->with('info', 'Your file has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::user()->can('view users')) {
            $user = User::where('id', $id)->first();
            return view('backend.user.show', compact('user'));
        } else {
            // Return a JSON response with a 403 status code if unauthorized
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->can('view users')) {
            $user = User::where('id', $id)->first();
            return view('backend.user.edit', compact('user'));
        } else {
            // Return a JSON response with a 403 status code if unauthorized
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::find($id);

        // Update the user fields
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Only update the password if it is provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password')); // Hash the password before saving
        }

        $user->save();

        return redirect('/dashboard/users/')->with('success', 'Your user has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->can('view users')) {
            $user = User::find($id);
            $user->delete();
            
            return redirect('/dashboard/users')->with('danger', 'Your user has been deleted.');
        } else {
            // Return a JSON response with a 403 status code if unauthorized
            abort(403);
        }
    }
}
