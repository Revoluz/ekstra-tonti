<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Database\Seeders\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(
            [
                [
                    'username' => 'admin1',
                    'password' =>bcrypt('yog1kar2ta3'),
                    'created_at' =>now(),
                    'updated_at' => now()
                ],
                                [
                    'username' => 'admin2',
                    'password' =>bcrypt('skan1sa2ba3'),
                    'created_at' =>now(),
                    'updated_at' =>now()
                                ],
                                                [
                    'username' => 'admin3',
                    'password' =>bcrypt('pass1word2'),
                    'created_at' =>now(),
                    'updated_at' =>now()
                ]
            ])->each(function ($user){
                DB::table('users')->insert($user);
            });
    }
}
