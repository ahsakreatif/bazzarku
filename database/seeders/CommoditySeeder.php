<?php

namespace Database\Seeders;

use App\Entities\CommodityType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Entities\User;
use App\Entities\Commodity;
use Illuminate\Support\Facades\DB;
class CommoditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $types = [
            'Stage and Visual',
            'Decor Furniture',
            'Booth and Exhibition',
            'Transportation and Logistics',
            'Catering and Food'
        ];

        DB::transaction(function () use ($faker, $types) {
            foreach ($types as $i => $type) {
                CommodityType::create([
                    'name' => $type,
                    'slug' => str_replace(' ', '-', strtolower($type)),
                    'picture' => 'https://picsum.photos/id/' . $i+21 . '/640/480',
                ]);
            }

            $commodities = [
                [
                    'name' => 'Stage and Visual',
                    'slug' => 'stage-and-visual',
                    'description' => 'Stage and Visual Description',
                    'picture' => 'https://picsum.photos/id/21/640/480',
                    'price' => $faker->randomFloat(0, 100000, 1000000),
                    'status' => 'available',
                    'location' => 'Tangerang',
                    'commodity_type_id' => 1,
                    'user_id' => 1,
                ],
                [
                    'name' => 'Decor Furniture',
                    'slug' => 'decor-furniture',
                    'description' => 'Decor Furniture Description',
                    'picture' => 'https://picsum.photos/id/22/640/480',
                    'price' => $faker->randomFloat(0, 100000, 1000000),
                    'status' => 'available',
                    'location' => 'Jakarta',
                    'commodity_type_id' => 2,
                    'user_id' => 1,
                ],
                [
                    'name' => 'Booth & Exhibition',
                    'slug' => 'booth-and-exhibition',
                    'description' => 'Booth & Exhibition Description',
                    'picture' => 'https://picsum.photos/id/23/640/480',
                    'price' => $faker->randomFloat(0, 100000, 1000000),
                    'status' => 'available',
                    'location' => 'Tangerang',
                    'commodity_type_id' => 3,
                    'user_id' => 1,
                ],
                [
                    'name' => 'Transportation & Logistics',
                    'slug' => 'transportation-and-logistics',
                    'description' => 'Transportation & Logistics Description',
                    'picture' => 'https://picsum.photos/id/24/640/480',
                    'price' => $faker->randomFloat(0, 100000, 1000000),
                    'status' => 'available',
                    'location' => 'Jakarta',
                    'commodity_type_id' => 4,
                    'user_id' => 1,
                ],
                [
                    'name' => 'Catering & Food',
                    'slug' => 'catering-and-food',
                    'description' => 'Catering & Food Description',
                    'picture' => 'https://picsum.photos/id/25/640/480',
                    'price' => $faker->randomFloat(0, 100000, 1000000),
                    'status' => 'rented',
                    'location' => 'Jakarta',
                    'commodity_type_id' => 5,
                    'user_id' => 1,
                ]
            ];

            for ($i = 0; $i < count($commodities); $i++) {
                $user = User::role('vendor')->inRandomOrder()->first();

                Commodity::create([
                    'name' => $commodities[$i]['name'],
                    'slug' => $commodities[$i]['slug'],
                    'description' => $commodities[$i]['description'],
                    'picture' => $commodities[$i]['picture'],
                    'price' => $commodities[$i]['price'],
                    'status' => $commodities[$i]['status'],
                    'location' => $commodities[$i]['location'],
                    'commodity_type_id' => $commodities[$i]['commodity_type_id'],
                    'user_id' => $user->id,
                ]);
            }
        });
    }
}

