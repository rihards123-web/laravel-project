<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $titles = [
            'Spiced Mint', 
            'Sweet Strawberry', 
            'Cool Blueberries', 
            'Juicy Lemon', 
            'Fragrant Cinnamon', 
            'Summer Cherries', 
            'Clean Lavender'
        ];


        return [
            'title' => $this->faker->randomElement($titles), // Izvēlas random no saraksta
            'price' => $this->faker->randomFloat(2, 5, 500),
            'description' => $this->faker->paragraph(),
            'image' => 'product' . $this->faker->numberBetween(1,7) . '.jpg'
        ];
    }
}
