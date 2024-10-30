<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        
        Article::factory()->count(20)->create();
        Category::factory()->count(5)->create();
        Comment::factory()->count(40)->create();

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Bob',
            'email' => 'bob@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'Alice',
            'email' => 'alice@gmail.com'
        ]);
    }
}
