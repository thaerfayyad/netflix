<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::WhereRoleNot('super_admin')->get();
        $users = User::WhereRoleNot('super_admin')
            ->WhereSearch(request()->search)
            ->WhenRole(request()->role_id)
            ->with('roles')
            ->paginate(3);
        return view('admin.user.index',compact('roles','users'));
    }

    public function create()
    {
        $roles = Role::WhereRoleNot(['super_admin','admin'])->get();
        return view('admin.user.create',compact('roles'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users,email',
            'password' =>'required|confirmed',
            'role_id' =>'required|numeric',

        ]);
        $request->merge(['password'=>bcrypt($request->password)]);
        $user = User::create($request->all());

        $user -> attachRoles(['admin',$request->role_id]);

        session()->flash('success',('the user added successfully'));
        return redirect()->route('admin.users.index');
    }




    public function edit(user $user)
    {
        $roles = Role::WhereRoleNot(['super_admin','admin'])->get();

        return view('admin.user.edit',compact('user','roles'));
    }


    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users,email,'.$user->id,
            'role_id' =>'required|numeric',
            ]);

        $user->update($request->all());
        $user -> syncRoles(['admin',$request->role_id]);
        session()->flash('success','The user Updated Successfully');
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {

        $user->delete();
        session()->flash('success','The user Deleted Successfully');
        return redirect()->back();

    }
}
