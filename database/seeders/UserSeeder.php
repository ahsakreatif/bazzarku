<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Entities\User;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // using transaction
    DB::transaction(function () {
        $faker = Faker::create();
            for ($i = 0; $i < 10; $i++) {
                $user = User::create([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => bcrypt('password')
                ]);

                // if odd number, create vendor
                if ($i % 2 !== 0) {
                    $user->assignRole('vendor');
                    $user->vendor()->create([
                        'vendor_name' => $faker->name,
                        'phone_number' => $faker->phoneNumber,
                        'description' => $faker->text,
                        'picture' => $faker->imageUrl(),
                    ]);
                }

                // if even number, create tenant
                if ($i % 2 === 0) {
                    $user->assignRole('tenant');
                    $user->tenant()->create([
                        'tenant_name' => $faker->name,
                        'phone_number' => $faker->phoneNumber,
                        'address' => $faker->address,
                        'city' => $faker->city,
                        'picture' => $faker->imageUrl(),
                        'profile' => $faker->text
                    ]);
                }

                $user->markEmailAsVerified();

            }
        });
    }
}
