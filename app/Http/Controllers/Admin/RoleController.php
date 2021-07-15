<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role ;

class RoleController extends Controller
{
    public function index()
    {
        $roles = role::WhereRoleNot(['super_admin','user','admin'])
            ->WhenSearch(request()->search)
            ->with('permissions')
            ->withCount('users')
            ->paginate(5);
        return view('admin.role.index',compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' =>'required|unique:roles,name',
            'permissions' =>'required|array|min:1',
        ]);
       // dd($request->permissions);
        $role = Role::create($request->all());
        $role -> attachPermissions($request->permissions);
        session()->flash('success',('the role added successfully'));
        return redirect()->route('admin.roles.index');
    }




    public function edit(role $role)
    {

        return view('admin.role.edit',compact('role'));
    }


    public function update(Request $request, role $role)
    {

        $request->validate([
            'name' =>'required|unique:roles,name,'.$role->id,
            'permissions' =>'required|array|min:1',
        ]);

        $role->update($request->all());
        $role -> syncPermissions($request->permissions);
        session()->flash('success','The role Updated Successfully');
        return redirect()->route('admin.roles.index');
    }

    public function destroy(role $role)
    {

        $role->delete();
        session()->flash('success','The role Deleted Successfully');
        return redirect()->back();

    }
}
