<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Src\Infrastructure\Models\Security\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'admin')->count()) {
            $user['names'] = 'admin';
            $user['lastnames'] = 'admin';
            $user['phonenumber'] = '3004587799';
            $user['address'] = 'cra 20 #30-30 Barrio Mareigua';
            $user['email'] = 'admin';
            $user['password'] = bcrypt('123');
            $user['password_reset'] = false;
            User::create($user);
        }
    }
}
