<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::factory()->times(5)->create();

        DB::table('roles')->insert([
            'name' => 'Admin'
        ]);

        DB::table('roles')->insert([
            'name' => 'Enterprise'
        ]);

        DB::table('roles')->insert([
            'name' => 'Freelancer'
        ]);

        DB::table('roles')->insert([
            'name' => 'Starter'
        ]);

        DB::table('roles')->insert([
            'name' => 'Employee'
        ]);
    }
}
