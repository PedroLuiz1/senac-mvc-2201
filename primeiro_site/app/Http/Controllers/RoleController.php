<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    public function  __construct() {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete',
                            ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create',
                            ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit',
                            ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-create',
                            ['only' => ['destroy']]);
    }

    public function index() {
        $roles = Role::orderby('id', 'DESC')->paginate(5);

        return view('roles.index', compact('roles'))->with('i', ($request->input('page', 1) - 1)* 5);
    }

    public function create() {
        $permission = Permission::get();

        return view('roles.create', compact('permission'));
    }

    public function store(Request $request) {
        $this->validate($request, ['name' => 'required|unique:roles,name',
                                    'permission' => 'required']);

        $role = Role::create(['name' => $request->input('name')]);
        
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('sucess', 'Perfil criado com sucesso');
    }

    public function show($id) {
        $role = Role::find($id);

        $rolePermissions = Permission::join('role_has_permissions',
                                            'role_has_permissions.permission_id',
                                            '=',
                                            'permission_id')->where('role_has_permission.role_id', $id)->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
