<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserCreatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "Sadra Resturant",
            'email' => 'sadra@sadraresturant.com',
            'password' => Hash::make('12345678'),
        ]);

        $role = Role::create(['name' => 'Admin']);

        try{
            $role->givePermissionTo(Permission::all());
        }catch(\Exception $e){
            User::destroy($user->id);
            Role::destroy($role->id);
            dd($e);
        }

        $user->assignRole('admin');

    }
}
