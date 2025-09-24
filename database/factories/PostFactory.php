<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(mt_rand(3, 5));
        $slug = strtolower(str_replace(' ', '-', $title));

        $body = '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(8, 15))) . '</p>';

        return [
            'title' => $title,
            'slug' => $slug,
            'category_id' => mt_rand(1, 3),
            'user_id' => mt_rand(1, 5),
            'excerpt' => $this->faker->paragraph(3),
            'body' => $body,
        ];
    }
}
