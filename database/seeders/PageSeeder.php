<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'menu_id' => null,
            'title' => 'Home',
            'feature_image' => null,
            'excerpt' => 'This is the Home page.',
            'author' => 'Admin',
            'hero' => json_encode([]),
            'content' => json_encode([
                ['type' => 'paragraph', 'text' => 'Welcome to the Home page!']
            ]),
            'status' => true,
            'order_by' => 1,
            'publish_date' => now(),
        ]);

    }
}
