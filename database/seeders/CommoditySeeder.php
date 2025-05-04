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

            $commodities = [];
            $locations = ['Jakarta', 'Tangerang', 'Bogor', 'Depok', 'Bekasi'];
            $statuses = ['available' ];

            // Generate 20 random commodities
            for ($i = 0; $i < 20; $i++) {
                $name = $faker->words(3, true);
                $commodities[] = [
                    'name' => ucwords($name),
                    'slug' => str_replace(' ', '-', strtolower($name)),
                    'description' => $faker->paragraph(),
                    'picture' => 'https://picsum.photos/id/' . ($i + 21) . '/640/480',
                    'price' => $faker->numberBetween(100000, 1000000),
                    'status' => $faker->randomElement($statuses),
                    'location' => $faker->randomElement($locations),
                    'commodity_type_id' => $faker->numberBetween(1, 5),
                    'user_id' => $faker->numberBetween(2, 10),
                ];
            }

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

