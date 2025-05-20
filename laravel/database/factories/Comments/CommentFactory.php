<?php

namespace Database\Factories\Comments;

use App\Models\Posts\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments\Comment>
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
        $userId = User::pluck('id')->toArray();
        $postId = Post::pluck('id')->toArray();
        return [
            'content' => $this->faker->sentence(),
            'user_id' => $userId ? $this->faker->randomElement($userId) : User::factory(),
            'post_id' => $postId ? $this->faker->randomElement($postId) : Post::factory(),
        ];
    }
}
