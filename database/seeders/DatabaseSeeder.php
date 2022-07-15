<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Src\Infrastructure\Models\Security\User;
use Src\Infrastructure\Models\Security\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (!Role::where('name', 'admin')->count()) {
            $role['code'] = 1;
            $role['name'] = 'admin';
            Role::create($role);
        }

        if (!Role::where('name', 'user')->count()) {
            $role['code'] = 2;
            $role['name'] = 'user';
            Role::create($role);
        }

        if (!User::where('email', 'admin')->count()) {
            $user['roleId'] = Role::where('code', 1)->first()->id;
            $user['names'] = 'admin';
            $user['lastnames'] = 'admin';
            $user['phonenumber'] = '3004587799';
            $user['address'] = 'cra 20 #30-30 Barrio Mareigua';
            $user['email'] = 'admin';
            $user['password'] = bcrypt('123');
            $user['password_reset'] = false;
            User::create($user);
        }

        if (!User::where('email', 'user')->count()) {
            $user['roleId'] = Role::where('code', 2)->first()->id;
            $user['names'] = 'user';
            $user['lastnames'] = 'user';
            $user['phonenumber'] = '3004587799';
            $user['address'] = 'cra 20 #30-30 Barrio Mareigua';
            $user['email'] = 'user';
            $user['password'] = bcrypt('123');
            $user['password_reset'] = false;
            User::create($user);
        }
    }
}
