<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.listUser', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreUserRequest $request)
    {

          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = bcrypt($request->password);
          $user->save();
          return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $user = User::find($user->id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        if (! $user->delete()) {
            return redirect()->route('admin.users.index')->with('error', 'User deleted failed');
        }

        return back()->with('success', 'User deleted successfully');
    }
}
