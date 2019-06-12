<?php

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
        //$this->call(\UsersTableSeeder::class);
        $faker = Faker::create();

        $adminsList = [
            [
                'name' => "Danilo",
                'last_name' => "Esser",
                'email' => "daniloesser@gmail.com"
            ],
            [
                'name' => "Baturay",
                'last_name' => "Kayaturk",
                "email" => "baturaykayaturk@gmail.com"
            ],
            [
                'name' => "Gurvinder",
                'last_name' => "Mangat",
                'email' => "gurvinder7@yahoo.com"
            ]
        ];

        foreach ($adminsList as $admin) {
            DB::table('users')->insert([
                'name' => $admin["name"],
                'last_name' => $admin["last_name"],
                'email' => $admin["email"],
                'password' => bcrypt('12345678'),
                'role' => "Admin"
            ]);
        }

        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'password' => bcrypt('12345678'),
            ]);
        }

        //$this->call(StudentsTableSeeder::class);
        $this->call(TestsTableSeeder::class);

    }
}
