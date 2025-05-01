<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Entities\User;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@bazzarku.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('super-admin');

        // logoipsum list of logo
        $logos = [330, 329, 327, 325, 323, 321, 317, 311, 300, 299, 298, 297, 296, 295, 294, 293, 292, 291, 290, 289];
        // using transaction
        DB::transaction(function () use ($logos) {
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
                        'location' => $faker->city,
                        'picture' => 'https://img.logoipsum.com/' . $logos[array_rand($logos)] . '.png',
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
                        'picture' => 'https://img.logoipsum.com/' . $logos[array_rand($logos)] . '.png',
                        'profile' => $faker->text
                    ]);
                }

                $user->markEmailAsVerified();

            }
        });
    }
}
