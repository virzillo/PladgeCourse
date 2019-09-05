<?php

use App\Token;
use App\Setting;
use Illuminate\Database\Seeder;

class InstallTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new  Setting();
        $setting->titolo = 'PladgeCourse';
        $setting->email = 'info@pladgepeople.it';
        $setting->logo = '/img.png';

        $setting->save();

        // $users = factory(App\Customer::class, 10)
        //     ->create()
        //     ->each(function ($user) {
        //         $user->posts()->save(factory(App\Post::class)->make());
        //     });
        // $this->call(CustomerFactory::class, 20);


        factory(App\Customer::class, 20)->create();
    }
}
