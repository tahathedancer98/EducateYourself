<?php

namespace Database\Factories;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FormationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Formation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'=>$this->faker->sentence(),
            'presentation' => $this->faker->sentence(6),
            'description'=>$this->faker->sentence(20),
            'prix'=>12.5,
            'image'=>$this->faker->sentence(10),
            'type'=>'facile',
            'user_id'=> 1
        ];
    }
}
