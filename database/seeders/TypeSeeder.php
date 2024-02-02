<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'arte',
                'description' => 'progetti artistici',
                'image' => 'prova.jpg'
            ],
            [
                'name' => 'tech',
                'description' => 'progetti tecnologici',
                'image' => 'prova.jpg'
            ],
            [
                'name' => 'sociale',
                'description' => 'progetti per il sociale',
                'image' => 'prova.jpg'
            ],
            [
                'name' => 'botanica',
                'description' => 'progetti per il verde comune',
                'image' => 'prova.jpg'
            ]
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->fill($type);
            $newType->save();
        }
    }
}
