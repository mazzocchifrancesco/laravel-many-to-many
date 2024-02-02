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
                'image' => 'https://normanno.com/N0rm4nn0/wp-content/uploads/2016/07/arte-colori.jpg'
            ],
            [
                'name' => 'tech',
                'description' => 'progetti tecnologici',
                'image' => 'https://images.pexels.com/photos/777001/pexels-photo-777001.jpeg'
            ],
            [
                'name' => 'sociale',
                'description' => 'progetti per il sociale',
                'image' => 'https://www.contributipmi.it/wp-content/uploads/2018/02/societa-servizi.jpg'
            ],
            [
                'name' => 'botanica',
                'description' => 'progetti per il verde comune',
                'image' => 'https://www.atlantedelleprofessioni.it/var/ezdemo_site/storage/images/_aliases/hero/2/2/9/3/83922-7-ita-IT/Botanico.jpg'
            ]
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->fill($type);
            $newType->save();
        }
    }
}
