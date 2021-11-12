<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formations = [
            [
                'nom' => 'Laravel',
                'presentation' => 'Apprenez les basics de Laravel',
                'duree' => 3,
                'prix' => '10',
                'description' => 'Laravel est un framework PHP gratuit qui facilite la programmation et le développement, apprenez le facilement avec cette formation frugal',
                'image' => 'test.png',
                'type' => 'Moyen',
                'user_id' => 2
            ],
            [
                'nom' => 'ReactJS',
                'presentation' => 'La meilleur technologie de Javascript',
                'duree' => 5,
                'prix' => '30',
                'description' => "Avec cette formation vous allez maitriser ReactJS ce qui vous permettra de pratiquer facilement cette technologie",
                'image' => 'test.png',
                'type' => 'Debutant',
                'user_id' => 2
            ],
            [
                'nom' => 'Photoshop',
                'presentation' => 'Modifier les photos comme un PRO!',
                'duree' => 2,
                'prix' => '5',
                'description' => 'Devenir un pro dans la modification des photos vous intéresse ? Alors cette formation est pour vous.',
                'image' => 'test.png',
                'type' => 'Expert',
                'user_id' => 1
            ]
        ];
        foreach ($formations as $formation){
            Formation::create([
                'nom' => $formation['nom'],
                'presentation' => $formation['presentation'],
                'duree' => $formation['duree'],
                'prix' => $formation['prix'],
                'description' => $formation['description'],
                'image' => $formation['image'],
                'type' => $formation['type'],
                'user_id' => $formation['user_id']
            ]);
        }
    }
}
