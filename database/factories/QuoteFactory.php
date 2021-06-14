<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sample_quotes = [
            "The Dude abides.",
            "The rug really tied the room together.",
            "The chinaman is not the issue here... also dude, Asian American please",
            "Yeah, well that's just like uhh, your opinion, man",
            "Hey, careful, man, there's a beverage here!"
        ];

        return [
            'user_id' => rand(1,5),
            'category' => rand(1,5),
            'author' => $this->faker->name(),
            'quote' => $sample_quotes[rand(0,4)],
            'image_src' => 'default.jpg',
        ];
    }
}
