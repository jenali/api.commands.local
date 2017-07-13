<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        //create admin
        DB::table('users')->insert([
            'name'       => 'admin',
            'email'      => 'admin@admin.net',
            'rid'        => 1,
            'password'   => bcrypt('admin'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        // create user
        DB::table('users')->insert([
            'name'       => 'user',
            'email'      => 'user@user.net',
            'rid'        => 2,
            'password'   => bcrypt('user'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
