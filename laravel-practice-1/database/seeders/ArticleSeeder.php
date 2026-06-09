<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 fake articles
        Article::factory()->count(10)->create();

        // Or insert specific ones
        Article::create([
            'title'   => 'New species of snake, endemic to Yangon, was found near Sule Pagoda',
            'body' => 'Details about the discovery...',
            'category_id' => 1
        ]);

        Article::create([
            'title'   => 'An earthquake with 7.6 magnitude shook Philippines yesterday',
            'body' => 'Details about the earthquake...',
            'category_id' => 2
        ]);

    }
}
