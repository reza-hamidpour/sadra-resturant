<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index(){

        $roles = Role::all();

        return view('Admin.pages.Users.Roles.index', compact('roles'));
    }

    public function create(){
        $permissions = Permission::all();
        return view('Admin.pages.Users.Roles.create', compact('permissions'));
    }

    public function store(Request $request){

        $permissions = Permission::all();
//        dd($request->permissions);
        $validation = [
          'name' => 'string|required',
          'permissions*' => ['array:ids', 'unique', Rule::in($permissions)]
        ];


        $request->validate($validation);

        $role = new Role();

        $role->name = $request->get('name');
        $permissions_ids = [];
        foreach($request->get('permissions') as $permission ){
            if($permission !== 0){
                $permissions_ids[] = $permission;
            }
        }

        try{
            $role->save();
            $role->permissions()->sync($permissions_ids);
            return redirect()->route('roles.index')->with('notify', [
               'status' => 'success',
               'msg' => 'Your role added successfully.'
            ])->with(
                'permissions', $permissions
            );
        }catch(\Exception $e){
            dd($e);
            return view('Admin.pages.Users.Roles.create', compact('permissions'))->with('notify',[
               'status' => 'danger',
               'msg' => 'An error acquired during saving your Role, please try again.'
            ]);
        }

    }


    public function show(Role $role, Request $request){
        $permissions = Permission::all();
        return view('Admin.pages.Users.Roles.edit', compact('role', 'permissions'));
    }


    public function update(Role $role, Request $request){
        $permissions = Permission::all();

        $validation = [
            'name' => 'string|required',
            'permissions*' => ['array:ids', 'nullable', Rule::in($permissions)],
        ];

        $request->validate($validation);


        $data = [
            'name' => $request->get('name'),
        ];

        $permission_ids = [];

        foreach($request->get('permissions') as $permission){
            if($permission !== 0){
                $permission_ids[] = $permission;
            }
        }

        try{
            $role->update($data);
            $role->permissions()->syncWithoutDetaching($permission_ids);
            return view('Admin.pages.Users.Roles.edit', compact('role', 'permissions'))->with('notify', [
               'status' => 'success',
               'msg' => 'Your role has updated successfully.'
            ]);
        }catch(\Exception $e){
            return view('Admin.pages.Users.Roles.edit', compact('role', 'permissions'))->with('notify', [
               'status' => 'danger',
               'msg' => 'An error acquired during updating your role, please try again or contact with your developer',
            ]);
        }


    }


    public function destroy(Role $role): \Illuminate\Http\RedirectResponse
    {
        try{
            $role->delete();
            return redirect()->route('roles.index')->with('notify', [
                'status' => 'success',
                'msg' => 'Your role has deleted successfully.'
            ]);
        }catch(\Exception $e){
            return redirect()->route('roles.index')->with('notify', [
               'status' => 'danger',
               'msg' => 'During deleting your roles, an error acquired, please try again, or contact with your developer',
            ]);
        }
    }
}
