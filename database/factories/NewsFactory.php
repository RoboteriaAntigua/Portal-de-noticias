<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\news>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model=News::class;

    public function definition(): array
    {
        return [
            //
            'title'=>$this->faker->name(),
            'content'=>$this->faker->text(),
            'autor'=>$this->faker->company(),
            'visitas'=>$this->faker->numberBetween(1,100)
        ];
    }
}
