<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $data = [
            ['name'=>'Manager', 'username'=>"admin_manager", "password"=>Hash::make('password'), "role"=> "manager"],
            ['name'=>'Designer', 'username'=>"admin_designer", "password"=>Hash::make('password'), "role"=> "web_designer"],
            ['name'=>'Developer', 'username'=>"admin_developer", "password"=>Hash::make('password'), "role"=> "web_developer"],
        ];

        User::insert($data);
    }
}
