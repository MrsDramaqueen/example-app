<?php

namespace Database\Factories;

use App\Models\Baker;
use Illuminate\Database\Eloquent\Factories\Factory;

class BakerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Baker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'last_name' => $this->faker->lastName,
            'age' => $this->faker->numberBetween(18,85),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
