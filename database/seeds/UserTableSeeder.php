<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
        'name' => "Admin",
        'email' => 'admin@admin.com', 
        'password'=>Hash::make('password'),
        'role_id' => 1
       ]);

       
       $user = User::create([
        'name' => "Debasish",
        'email' => 'debasish@test.com', 
        'password'=>Hash::make('password'),
        'role_id' => 2
       ]);
    }
}
