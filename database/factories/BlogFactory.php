<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_ids = User::all()->pluck('user_id');

        return [
            'blog_title' => Str::ucfirst($this->faker->words(2, true)),
            // 'blog_title' => $this->faker
            'blog_content' => $this->faker->paragraph(5),
            'owner_id' => $this->faker->randomElement($user_ids)
        ];
    }
}
