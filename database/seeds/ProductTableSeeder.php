<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Product::class, 20)->create()->each(function ($user) {
            $user->option()->save(factory(\App\Models\Option::class)->make());
        });
    }
}
