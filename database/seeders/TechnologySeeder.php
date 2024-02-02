<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'name' => 'Energia Solare',
            ],
            [
                'name' => 'Cloud Computing',
            ],
            [
                'name' => 'AI',
            ],
            [
                'name' => 'Realtà aumentata',
            ],
            [
                'name' => 'Social Media',
            ],
            [
                'name' => 'Crittografia',
            ]
        ];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->fill($technology);
            $newTechnology->save();
        }
    }
}
