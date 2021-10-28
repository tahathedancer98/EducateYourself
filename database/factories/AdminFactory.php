<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email'=>'admin@admin.com',
            'motdepasse'=>'$2y$10$78KiK3YmSo9ah3Yam2jGs.H2UtBdYKLXtk5zOi/mhdEy8LiCD3ea6' // admin
        ];
    }
}
