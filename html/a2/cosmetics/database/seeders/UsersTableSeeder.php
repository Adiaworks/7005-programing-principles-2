<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        DB::table('users')->insert([
            'name' => "Moderator",
            'email' => 'Moderator@a.org',
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
            'password' => bcrypt('1234'),
            'type' => 'Moderator',
            'following' => '2,6',
        ]);
        DB::table('users')->insert([
            'name' => "Chris",
            'email' => 'Chris@a.org',
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
            'password' => bcrypt('1234'),
            'type' => 'Moderator',
        ]);
        DB::table('users')->insert([
            'name' => "Member",
            'email' => 'Member@a.org',
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
            'password' => bcrypt('1234'),
            'type' => 'Member',

        ]);
        DB::table('users')->insert([
            'name' => "Cara",
            'email' => 'Cara@a.org',
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
            'password' => bcrypt('1234'),
            'type' => 'Member',
            'following' => '10',
        ]);
        DB::table('users')->insert([
            'name' => "Bob",
            'email' => 'Bob@a.org',
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
            'password' => bcrypt('1234'),
            'type' => 'Member',
            'following' => '1,3,4',
        ]);
        DB::table('users')->insert([
            'name' => "Fred",
            'email' => 'Fred@a.org',
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
            'password' => bcrypt('1234'),
            'type' => 'Member',
        ]);
        DB::table('users')->insert([
            'name' => "Alice",
            'email' => 'Alice@a.org',
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
            'password' => bcrypt('1234'),
            'type' => 'Member',
            'following' => '4,5,10',
        ]);
        DB::table('users')->insert([
            'name' => "Sherry",
            'email' => 'Sherry@a.org',
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
            'password' => bcrypt('1234'),
            'type' => 'Member',
        ]);
        DB::table('users')->insert([
            'name' => "Tony",
            'email' => 'Tony@a.org',
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
            'password' => bcrypt('1234'),
            'type' => 'Member',
            'following' => '7,8,6',
        ]);
        DB::table('users')->insert([
            'name' => "Lizz",
            'email' => 'Lizz@a.org',
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
            'password' => bcrypt('1234'),
            'type' => 'Moderator',
            'following' => '4,5,8',
        ]);

       
        
    }
}
