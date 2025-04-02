<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'menu_id' => null,
            'title' => $this->faker->sentence,
            'slug' => null,
            'feature_image' => null,
            'excerpt' => $this->faker->text(100),
            'author' => $this->faker->name,
            'hero' => null,
            'content' => json_encode([
                ['type' => 'paragraph', 'text' => $this->faker->paragraph],
            ]),
            'status' => 'published',
            'order_by' => $this->faker->randomDigitNotNull,
            'publish_date' => now(),
        ];

    }
}
