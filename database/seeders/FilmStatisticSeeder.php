<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\FilmStatistic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class FilmStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path('seeders/data_source.json');
        
        // IA : ChatGPT*
        $jsonContent = json_decode(File::get($jsonPath), true);
        $jsonData = $jsonContent['data'] ?? [];

        foreach ($jsonData as $filmData) {
            $filmId = $filmData['id'];
            
            $film = Film::find($filmId);
            if (!$film) {
                continue;
            }

            $scores = [];
            if (isset($filmData['reviews']) && is_array($filmData['reviews'])) {
                foreach ($filmData['reviews'] as $review) {
                    $scores[] = $review['score'];
                }
            }

            $externalAverage = !empty($scores) ? array_sum($scores) / count($scores) : 0;
            $externalCount = count($scores);

            FilmStatistic::updateOrCreate(
                ['film_id' => $filmId],
                [
                    'average_score' => round($externalAverage, 2),
                    'total_ratings' => $externalCount
                ]
            );
        }

        $this->command->info('Film statistics seeded successfully.');
    }
}


/**
   IA : ChatGPT*
   json_decode() est une fonction de PHP qui transforme une chaîne JSON en donnée exploitable en PHP.

    Syntaxe :

    json_decode(string $json, bool $associative = false)

    Exemple simple :

    $json = '{"nom":"Charles","age":18}';

    $data = json_decode($json);

    echo $data->nom;

    Résultat :

    Charles
 */