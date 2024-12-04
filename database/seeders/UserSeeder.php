<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'user01',
                'user_id' => 001,
                'email' => 'user01@test.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ],
            [
                'name' => 'user02',
                'user_id' => 002,
                'email' => 'user02@test.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ],
            [
                'name' => 'user03',
                'user_id' => 003,
                'email' => 'user03@test.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ],
            [
                'name' => 'user04',
                'user_id' => 004,
                'email' => 'user04@test.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ],
            [
                'name' => 'user05',
                'user_id' => 005,
                'email' => 'user05@test.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ],
        ]);
    }
}
