<?php

namespace Database\Seeders;

use App\Models\FormationsChapitres;
use Illuminate\Database\Seeder;

class FormationChapitreSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'formation' => 1,
                'chapitre' => 1,
            ],
            [
                'formation' => 1,
                'chapitre' => 2,
            ],
            [
                'formation' => 1,
                'chapitre' => 3,
            ],
            [
                'formation' => 2,
                'chapitre' => 1,
            ],
            [
                'formation' => 3,
                'chapitre' => 3,
            ],

        ];
        foreach ($datas as $data){
            FormationsChapitres::create([
                'formation' => $data['formation'],
                'chapitre' => $data['chapitre'],
            ]);
        }
    }
}
