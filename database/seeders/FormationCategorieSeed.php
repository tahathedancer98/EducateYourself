<?php

namespace Database\Seeders;

use App\Models\FormationsCategories;
use Illuminate\Database\Seeder;

class FormationCategorieSeed extends Seeder
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
                'categorie' => 1,
            ],
            [
                'formation' => 1,
                'categorie' => 3,
            ],
            [
                'formation' => 2,
                'categorie' => 1,
            ],
            [
                'formation' => 2,
                'categorie' => 3,
            ],
            [
                'formation' => 3,
                'categorie' => 2,
            ],

        ];
        foreach ($datas as $data){
            FormationsCategories::create([
                'formation' => $data['formation'],
                'categorie' => $data['categorie'],
            ]);
        }
    }
}
