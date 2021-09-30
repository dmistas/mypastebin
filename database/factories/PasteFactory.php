<?php

namespace Database\Factories;

use App\Models\Paste;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PasteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paste::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'content' => $this->faker->text,
            'access' => $this->faker->randomElement(Paste::ACCESSES),
            'expiration_time' => $this->faker->randomElement(Paste::EXPIRATION_TIME_ARRAY),
            'hash' => Str::random(8)
        ];
    }
}
