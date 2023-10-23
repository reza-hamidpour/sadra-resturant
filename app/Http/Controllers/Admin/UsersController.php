<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();

        return view('Admin.pages.Users.index', compact('users'));
    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function show(User $user, Request $request){
        $roles = Role::all();
        return view('Admin.pages.Users.edit', compact('user', 'roles'));

    }

    public function update(User $user, Request $request){
        $roles = Role::all();
        $validations = [
          'name' => 'string|nullable',
            'roles.*' => ['array:ids', Rule::in($roles), 'nullable']
        ];


        $assigned_roles = [];
        if(is_array($request->get('roles')) && !in_array('0',$request->get('roles'))){
            foreach($request->get('roles') as $role_id){
                $assigned_roles[] = $role_id;
            }
        }

        $data = [
            'name' => $request->get('name')
        ];

        try{
            $user->update($data);
            $user->roles()->detach();
            $user->roles()->sync($assigned_roles);

            return view('Admin.pages.Users.edit', compact('user', 'roles'))->with('notify',[
               'status' => 'success',
               'msg' => 'User update successfully.'
            ]);

        }catch(\Exception $e){
            return view('Admin.pages.Users.edit', compact('user', 'roles'))->with('notify', [
               'status' => 'danger',
               'msg' => 'An error acquired during your update, please try again.',
            ]);
        }



    }

    public function destroy(User $user, Request $request){

    }

}
