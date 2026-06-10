<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Constants\GeneralConst;

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
            'role' => GeneralConst::ADMIN,
        ]);

        User::create([
            'name' => 'Myint Zu Maung', 
            'email' => 'myintzumaung@gmail.com', 
            'password' => Hash::make('myintzumaung'), 
            'role' => GeneralConst::MEMBER,
        ]);

        User::create([
            'name' => 'Hsu Myat Mo', 
            'email' => 'hsumyatmo@gmail.com', 
            'password' => Hash::make('hsumyatmo'), 
            'role' => GeneralConst::MEMBER,
        ]);

        User::create([
            'name' => 'Hay Mar Soe Naing', 
            'email' => 'haymarsoenaing@gmail.com', 
            'password' => Hash::make('haymarsoenaing'), 
            'role' => GeneralConst::MEMBER,
        ]);

    }
}
