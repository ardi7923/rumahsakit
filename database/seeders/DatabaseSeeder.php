<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Time;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(!User::count()){
            $this->call(UserSeeder::class);
        }

        if(!Room::count()){
            $this->call(RoomSeeder::class);
        }

        if(!Time::count()){
            $this->call(TimeSeeder::class);
        }
    }
}
