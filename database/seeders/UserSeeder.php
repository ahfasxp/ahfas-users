<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User;
        $user->name = "Administrator";
        $user->email = "admin@mail.com";
        $user->password = \Hash::make("admin123");
        $user->save();
    }
}
