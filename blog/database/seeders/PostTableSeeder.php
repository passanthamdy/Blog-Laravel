<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(100)->create();

    }
}
