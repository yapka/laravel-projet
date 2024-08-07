<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = collect(['Plaisantain', 'Junior', 'Senior', 'Goat', 'Super-Goat', 'Ultra-Goat', 'Zoulkift']);

        $tags->each(fn($tag) =>Tag::create(
           [ 'name'=> $tag,
            'slug'=> Str::slug($tag),
            ]
        ));
}
}
