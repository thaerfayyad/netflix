<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role ;

class RoleController extends Controller
{
    public function index()
    {
        $roles = role::WhereRolesNot(['super_admin','user','admin'])->WhenSearch(request()->search)->paginate(5);
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
        $role ->name = $request->name;
        $role -> attachPermissions($request->permissions);

        $role->save();
        session()->flash('success',('the role added successfully'));
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(role $role)
    {

        return view('admin.role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(role $role)
    {

        $role->delete();
        session()->flash('success','The role Deleted Successfully');
        return redirect()->back();

    }
}
