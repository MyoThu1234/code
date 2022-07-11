<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => date("F j\, Y\, h:i A"),
            'content' =>$this->faker-> text($maxNbChars = 30),
            'image' =>$this->faker-> imageUrl($width = 640, $height = 480) ,
            'user_id' => rand(1, 4),
            'category_id' =>rand(1, 4),
        ];
    }
}
