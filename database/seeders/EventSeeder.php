<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\Event;
use App\Entities\EventType;
use App\Entities\User;
use Faker\Factory as Faker;
use App\Constants\StatusEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // use db transaction
        DB::transaction(function () {
            $faker = Faker::create();

            // create 5 event types
            $event_types = [
                'Music',
                'Sport',
                'Seminar',
                'Workshop',
                'Exhibition'
            ];
            for ($i = 0; $i < 5; $i++) {
                EventType::create([
                    'name' => $event_types[$i],
                    'slug' => strtolower($event_types[$i]),
                    'picture' => 'https://picsum.photos/id/' . $i+1 . '/640/480',
                    'description' => $event_types[$i] . ' Event Type Description'
                ]);
            }

            for ($i = 0; $i < 20; $i++) {
                // get random User Vendor
                $user = User::role('vendor')->inRandomOrder()->first();

                Event::create([
                    'name' => $faker->name,
                    'slug' => $faker->slug,
                    'description' => $faker->text,
                    'picture' => 'https://picsum.photos/id/' . $i+1 . '/640/480',
                    'start_date' => now(),
                    'end_date' => now()->addDays(30),
                    'event_type_id' => $faker->numberBetween(1, 5),
                    'user_id' => $user->id,
                    'location' => $faker->city(),
                    'status' => StatusEvent::ACTIVE,
                    'price' => $faker->randomFloat(0, 100000, 1000000),
                    'is_promoted' => $faker->boolean,
                ]);
            }
        });
    }
}
