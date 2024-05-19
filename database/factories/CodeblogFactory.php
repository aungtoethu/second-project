<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Codeblog>
 */
class CodeblogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->unique()->sentence(),
            'slug'=>$this->faker->unique()->name(),
            'intro'=>$this->faker->unique()->name(),
            'body'=>$this->faker->paragraph(),
            'category_id'=>Category::factory(),
            'user_id'=>User::factory()

        ];
    }
}
