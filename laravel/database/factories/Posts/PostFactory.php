<?php

namespace Database\Factories\Posts;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::pluck('id')->toArray();
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->sentence(),
            'user_id' => $userId ? $this->faker->randomElement($userId) : User::factory(),
        ];
    }
}
