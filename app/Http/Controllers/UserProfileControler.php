<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserProfileControler extends Controller
{
    public function index(Request $request){

        if(Auth::check() ) {
            $user = $request->user();
            return view('Users.dashboard', compact('user'));
        }else
            return redirect()->to('login');
    }

    public function info_update(Request $request){

        $validation = [
            'name' => "string|nullable",
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ];

        $request->validate($validation);

        $user = User::where('email', $request->email)->get();
        $user = $user->first();
        if($user instanceof User){

            $data = [
                "name" => $request->name,
            ];

            if($request->password !== "" )
                $data['password'] = Hash::make($request->password);

            try{
                $user->update($data);
                return view('Users.dashboard', compact('user'))->with('notify', [
                    'msg' => "Your informations updated successfully.",
                    'status' => 'success'
                ]);
            }catch(\Exception $e){

                return view('Users.dashboard', compact('user'))->with('notify', [
                    'msg' => "During updating your information, something went wrong, please try again.",
                    'status' => 'danger'
                ]);
            }
        }else{
            return view('Users.dashboard', compact('user'))->with('notify', [
                'msg' => 'Could not update your information at this moment, please try again later.',
                'status' => 'danger',
            ]);
        }

    }
}
