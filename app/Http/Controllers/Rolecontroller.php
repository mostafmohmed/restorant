<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class Rolecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data = Role::all();
       
        return view('admin.Roles.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission=Permission::all();
       
      
        return  view('admin.Roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $data = $request->toArray();
      
        $role = Role::create(['name' => $data['name'], 'guard_name' => 'admin']);

        if (isset($data['permissionArray'])) {
            foreach ($data['permissionArray'] as $permission => $value) {
                $role->givePermissionTo($permission);
            }
        }
       return redirect()-> back()->with('success','the sucsess massage');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $groups = Permission::where('guard_name', 'admin')->get();
        return view('admin.Roles.show', \get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $groups = Permission::where('guard_name', 'admin')->get();
        return view('admin.Roles.edite', \get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Role $role)
    {
        $data=$request;
        $role->update(['name' => $data['name']]);
        $role->syncPermissions();
        if (isset($data['permissionArray'])) {
            foreach ($data['permissionArray'] as $permission => $value) {
                $role->givePermissionTo($permission);
            }
        }
        return redirect()->back()->with('success','the sucess massaage');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->syncPermissions();
        $role->delete();
        return redirect()->back()->with('success','the sucess massaage');
    }
}
