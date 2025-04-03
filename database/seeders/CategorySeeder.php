<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories= [
            [
                'name' => 'Flash News',
                'slug' => 'flash-news',
                'description' => 'Breaking and urgent news updates.',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'News & Events',
                'slug' => 'news-events',
                'description' => 'General news and event updates.',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Popup',
                'slug' => 'popup',
                'description' => 'Important notifications displayed as popups.',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Upcoming Events',
                'slug' => 'upcoming-events',
                'description' => 'Details of upcoming events.',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
