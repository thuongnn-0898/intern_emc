<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Category::create([
            'name' => 'Apple',
        ]);

        User::create([
            'name' => 'Nguyen Thuong',
            'email' => 'nguyenthuong@gmail.com',
            'password' => Hash::make(123123),
            'role' => \App\Enums\UserRole::Admin,
        ]);
        factory(\App\Models\User::class, 50)->create()->each(function ($user) {
            $user->profile()->save(factory(\App\Models\Profile::class)->make());
        });
    }
}
