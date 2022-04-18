<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;



class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Post::class;

    public function definition()
    {
        $users = User::pluck('id');
        return [
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->text(),
            'user_id' => $this->faker->randomElement($users)
        ];
    }
}
