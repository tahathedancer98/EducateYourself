<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Web'
            ],
            [
                'name' => 'Design'
            ],
            [
                'name' => 'Dev'
            ],
            [
                'name' => 'Desktop'
            ],
            [
                'name' => 'Bureautique'
            ]
        ];
        foreach ($categories as $categorie){
            Categorie::create([
                'name' => $categorie['name'],
            ]);
        }
    }
}
