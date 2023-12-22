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
            'email' => 'support@fsscholarship.com',
            'email_verified_at' =>  Carbon::now(),
            'password' => Hash::make('password'),
            'dob' => '1990/03/27',
            'gender' =>'Male',
            'phone_number'=>'08103440497',
            'role'=>'admin',
            'registeredby' => 'self',
            'is_active' =>true,
            'created_at' => Carbon::now(),
        ]);
    }
}