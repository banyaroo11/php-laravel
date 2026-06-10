<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // DB::table('users')->truncate();
        // User::factory()->count(50)->create();

        User::create([
            'name' => 'Banyar Oo', 
            'email' => 'banyaroo@gmail.com', 
            'password' => Hash::make('banyaroo'), 
            'role' => 'author'
        ]);

        User::create([
            'name' => 'Myint Zu Maung', 
            'email' => 'myintzumaung@gmail.com', 
            'password' => Hash::make('myintzumaung'), 
            'role' => 'visitor'
        ]);

        User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com', 
            'password' => Hash::make('admin12345'), 
            'role' => 'admin'
        ]);

    }
}
