<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\ContentArticle;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $user = User::first();

        for ($i = 1; $i <= 20; $i++) {
            $slug = Str::slug(fake()->sentence('10'));
            $article = Article::create([
                'title' => fake()->sentence('10'),
                'slug' => $slug,
                'reference_url' => route('fs.post.detail', ['slug' => $slug]),
                'description' => fake()->realText(50),
                'categories' => fake()->randomElement(['0', '1']),
                'user_id' => $user->id,
            ]);

            ContentArticle::create([
                'long_text' => fake()->realText(250),
                'article_id' => $article->id
            ]);
        }
    }
}
