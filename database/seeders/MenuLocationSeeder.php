<?php

namespace Database\Seeders;

use App\Models\MenuLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['name' => 'Header'],
            ['name' => 'Footer'],
            ['name' => 'Topbar'],
            ['name' => 'Floating'],
        ];

        foreach ($locations as $location) {
            MenuLocation::create($location);
        }
    }
}
