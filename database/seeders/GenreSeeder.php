<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = collect([
            'Alternative',
            'Acoustic',
            'Blues',
            'Classic',
            'Country',
            'Dance',
            'Dangdut',
            'Ease Listening',
            'Funk',
            'Folk',
            'Gospel',
            'Hiphop',
            'Jazz',
            'Metal',
            'Pop',
            'R&B',
            'Reggae',
            'Rock',
            'Techno',
        ]);

        $genres->each( function ($genre){
            Genre::create([
                'name' => $genre,
                'slug' => Str::slug($genre)
            ]);
        });
    }
}
