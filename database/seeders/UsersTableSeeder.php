<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'first_name' => 'IT',
            'last_name' => 'Support',
            'email' => 'support@oisservices.com',
            'password' => Hash::make('passwd'),
            'phone_number'=>'08103440497',
            'role'=>'applicant',
            'is_active' =>true,
            'created_at' => Carbon::now(),
        ]);
    }
}