<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class FriendRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_EN');

        for ($i = 0; $i < 20; $i++) {
            DB::table('friend_requests')->insert([
                'sender_id' => $faker->numberBetween(1, 20),
                'receiver_id' => $faker->numberBetween(1, 20),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}