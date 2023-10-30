<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Seeder;
use SebastianBergmann\CliParser\AmbiguousOptionException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Mario',
            'email' => 'mario@example.com',
            'password' => bcrypt('password'),
        ]);

        $categories = ['Cronaca', 'Sport', 'Economia', 'Attualità', 'Musica', 'Natura', 'Politica'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }

        Tag::factory(10)->create();
    }
}
