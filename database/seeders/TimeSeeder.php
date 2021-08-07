<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $d) {
            Time::create($d);
        }
    }

    private function data()
    {
        return [
            ["id" => 1, "time" => "09:00 - 10:00"],
            ["id" => 2, "time" => "10:00 - 11:00"],
            ["id" => 3, "time" => "11:00 - 12:00"],
            ["id" => 4, "time" => "12:00 - 13:00"],
            ["id" => 5, "time" => "13:00 - 14:00"],
            ["id" => 6, "time" => "14:00 - 15:00"],
            ["id" => 7, "time" => "15:00 - 16:00"],
            ["id" => 8, "time" => "16:00 - 17:00"],
        ];
    }
}
