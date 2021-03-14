<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = implode(' ', $this->faker->words(rand(1, 3)));
        $url = str_replace(' ', '_', $title);
        return [
            'title' => $title,
            'content' => $this->faker->realText(1000),
            'ingredients' => implode(', ', $this->faker->words(rand(5, 10))),
            'url' => $url,
            'tags' => implode(', ', $this->faker->words(rand(0, 5))) ,
            'date' => $this->faker->dateTime,
            'status' => $this->faker->text(45),
        ];
    }
}
