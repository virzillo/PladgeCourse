<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permission = Permission::where('slug', 'create-tasks')->first();
        $user_permission = Permission::where('slug', 'edit-users')->first();

        //RoleTableSeeder.php
        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Front-end Developer';
        $admin_role->save();
        $admin_role->permissions()->attach($admin_permission);

        $user_role = new Role();
        $user_role->slug = 'user';
        $user_role->name = 'General User';
        $user_role->save();
        $user_role->permissions()->attach($user_permission);
    }
}
