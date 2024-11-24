<?php

namespace Database\Seeders;

use App\Entities\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'admin@bazzarku.com.com';
        $user = User::where('email', $email)->first();

        // Create SuperAdmin
        if (!$user) {
            $user = User::create([
                'name' => 'SuperAdmin',
                'email' => $email,
                'password' => Hash::make('ahsa123'),
            ]);

            $user->markEmailAsVerified();
            $user->assignRole([1]); // Superadmin
        }

        // create example customer
        $email = 'customer@bazzarku.com.com';
        $user = User::where('email', $email)->first();
        if (!$user) {
            $user = User::create([
                'name' => 'Agus bazzarku.com',
                'email' => $email,
                'password' => Hash::make('ahsa123'),
            ]);

            $user->profile()->create([
                'phone_number' => '08123456789',
                'identity_code' => '1234567890',
                'custom_number' => '1234567890',
                'birth_place' => 'Jakarta',
                'birth_date' => '1990-01-01',
                'profile_picture' => 'https://via.placeholder.com/150',
                'address_detail' => 'Jl. Jalan',
                'address_city_id' => 3171,
            ]);

            $user->customer()->create([
                'total_balance' => 0,
            ]);

            $user->markEmailAsVerified();
            $user->assignRole([3]); // Customer
        }

        // create example expert
        $email = 'expert@bazzarku.com.com';
        $user = User::where('email', $email)->first();
        if (!$user) {
            $user = User::create([
                'name' => 'Tantowi bazzarku.com',
                'email' => $email,
                'password' => Hash::make('ahsa123'),
            ]);

            $user->profile()->create([
                'phone_number' => '081232256789',
                'identity_code' => '1234227890',
                'custom_number' => '1234227890',
                'birth_place' => 'Jakarta',
                'birth_date' => '1990-01-01',
                'profile_picture' => 'https://via.placeholder.com/150',
                'address_detail' => 'Jl. Jalan',
                'address_city_id' => 3171,
            ]);

            $user->expert()->create([
                'title' => 'Expert Civil Engineering',
                'resume' => 'I am an expert in civil engineering',
                'expertise' => 'Civil Engineering',
                'avg_rating' => 5,
            ]);

            $user->markEmailAsVerified();
            $user->assignRole([4]); // Expert
        }
    }
}
