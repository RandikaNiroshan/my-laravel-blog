<?php

namespace Database\Factories;

use App\Models\BlogPost;
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
    public function definition()
    {
        $users = User::all();
        $blogPosts = BlogPost::all();
        
        return [
            'content' => $this->faker->paragraph(1, false),
            'user_id' => $users->random()->id,
            'blog_post_id' => $blogPosts->random()->id
        ];
    }
}
