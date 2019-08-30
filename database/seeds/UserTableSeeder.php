<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin_role = Role::where('slug', 'admin')->first();
        $user_role = Role::where('slug', 'user')->first();
        $admin_perm = Permission::where('slug', 'create-tasks')->first();
        $user_perm = Permission::where('slug', 'edit-users')->first();

        $admin = new User();
        $admin->name = 'Riccardo Virgilio';
        $admin->email = 'riccardo.virgilio@gmail.com';
        $admin->password = bcrypt('Vrz021281');
        $admin->save();
        $admin->roles()->attach($admin_role);
        $admin->permissions()->attach($admin_perm);


        $user = new  User();
        $user->name = 'Asad Butt';
        $user->email = 'asad@thewebtier.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($user_role);
        $user->permissions()->attach($user_perm);
    }
}
