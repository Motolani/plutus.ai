<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            DB::table('users')->insert([
                'name' => $faker->firstname,
                'lastname' => $faker->lastname,
                'email' => $faker->unique()->safeEmail,
                'password' => encrypt('12345678'),
                'role' => $faker->numberBetween(2, 5),
                'created_at' => $faker->dateTimeBetween('-6 month', '+1 month')
            ]);
        }
    }
}
