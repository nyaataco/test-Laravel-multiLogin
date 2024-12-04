<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('owners')->insert([
            [
                'name' => 'owner01',
                'email' => 'owner01@test.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ],
        ]);
    }
}
