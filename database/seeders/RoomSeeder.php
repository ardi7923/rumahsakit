<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->data() as $d){
            Room::create($d);
        }
        
    }

    private function data()
    {
        return [
            ["id" => 1, "name" => "Rawat inap TB Paru"],
            ["id" => 2, "name" => "Rawat inap anak kelas 1 dan 2"],
            ["id" => 3, "name" => "Rawat inap anak kelas 3"],
            ["id" => 4, "name" => "Ruang bersalin"],
            ["id" => 5, "name" => "Ruang ICU"],
            ["id" => 6, "name" => "Ruang Isolasi"],
            ["id" => 7, "name" => "Ruang Perina"],
            ["id" => 8, "name" => "Ruang Interna"],
            ["id" => 9, "name" => "Ruang Bedah"],

        ];
    }
}
