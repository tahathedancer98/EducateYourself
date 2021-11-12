<?php

namespace Database\Seeders;

use App\Models\Chapitre;
use Illuminate\Database\Seeder;

class ChapitreSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chapitres = [
            [
                'name' => 'Test de chapitre 1',
                'detailsChapitre' => 'Details du Test de chapitre 1'
            ],
            [
                'name' => 'Le chapitre 2',
                'detailsChapitre' => 'Details du Test de chapitre 2'
            ],
            [
                'name' => "C'est le chapitre 3",
                'detailsChapitre' => 'Details Test de chapitre 3'
            ]
        ];
        foreach ($chapitres as $chapitre){
            Chapitre::create([
                'name' => $chapitre['name'],
                'detailsChapitre' => $chapitre['detailsChapitre']
            ]);
        }
    }
}
