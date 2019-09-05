<?php

use App\Card;
use App\Role;
use App\User;
use App\Setting;
use App\Permission;
use Illuminate\Database\Seeder;

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

        $setting = new  Setting();
        $setting->titolo = 'PladgeCourse';
        $setting->email = 'info@pladgepeople.it';
        $setting->logo = 'img.png';

        $setting->save();

        $card = new  Card();
        $card->nome = 'Ei-Card EIPASS Unica';
        $card->save();

        $card = new  Card();
        $card->nome = 'Eipass Corsi on-line';
        $card->save();

        $card = new  Card();
        $card->nome = 'UPGRADE';
        $card->save();

        $card = new  Card();
        $card->nome = 'PEKIT';
        $card->save();

        $card = new  Card();
        $card->nome = 'Inglese Token A1';
        $card->save();

        $card = new  Card();
        $card->nome = 'Inglese Token A2';
        $card->save();

        $card = new  Card();
        $card->nome = 'Inglese Token B1';
        $card->save();

        $card = new  Card();
        $card->nome = 'Inglese Token B2';
        $card->save();

        $card = new  Card();
        $card->nome = 'Inglese Token C1';
        $card->save();

        $card = new  Card();
        $card->nome = 'Inglese Token C2';
        $card->save();
    }
}
