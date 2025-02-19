<?php

namespace Database\Factories;

use App\Models\Codeblog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body'=>fake()->sentence(),
            'codeblog_id'=>Codeblog::factory(),
            'user_id'=>User::factory(),
        ];
    }
}
