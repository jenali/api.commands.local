<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class CommandsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        // create 100 commands.
        for($i = 0; $i < 100; $i++) {
            DB::table('commands')->insert([
                'name'       => $faker->word(),
                'country'    => $faker->country(),
                'city'       => $faker->city(),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
