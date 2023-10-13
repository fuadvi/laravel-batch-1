<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $family = [
            [
                "id" => 1,
                "nama" => "kakek 1",
            ],
            [
                "id" => 2,
                "nama" => "ayah",
                "parent_id" => 1,
            ],
            [
                "id" => 3,
                "nama" => "anak",
                "parent_id" => 2,
            ],
            [
                "id" => 4,
                "nama" => "cucu",
                "parent_id" => 3,
            ],
            [
                "id" => 5,
                "nama" => "kakek 2",
            ],
        ];

        Family::insert($family);
    }
}
