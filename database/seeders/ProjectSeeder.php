<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 5; $i++) {
            $nuovoProgetto = new Project();
            $nuovoProgetto->name = $faker->sentence(2);
            $nuovoProgetto->description = $faker->paragraph(2);
            $nuovoProgetto->creation_date = $faker->dateTime();
            $nuovoProgetto->image = $faker->imageUrl(640, 480, 'cars', true);
            $nuovoProgetto->supervisor = $faker->firstName() . " " . $faker->lastName();
            $nuovoProgetto->type_id = $faker->numberBetween(0, 4);
            $nuovoProgetto->save();
        }
    }
}
