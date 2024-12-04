<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'admin_id' => 001,
                'name' => 'admin01',
                'email' => 'admin01@test.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ],
            [
                'admin_id' => 002,
                'name' => 'admin02',
                'email' => 'admin02@test.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ],
            [
                'admin_id' => 003,
                'name' => 'admin03',
                'email' => 'admin03@test.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ],
            [
                'admin_id' => 004,
                'name' => 'admin04',
                'email' => 'admin04@test.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ],
            [
                'admin_id' => 005,
                'name' => 'admin05',
                'email' => 'admin05@test.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ],
        ]);
    }
}
