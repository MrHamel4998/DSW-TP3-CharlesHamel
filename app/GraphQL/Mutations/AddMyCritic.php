<?php

namespace App\GraphQL\Mutations;

use App\Models\Critic;
use App\Models\FilmStatistic;
use Illuminate\Support\Facades\DB;

class AddMyCritic
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args): FilmStatistic
    {
        return DB::transaction(function () use ($args): FilmStatistic {
            Critic::create([
                'user_id' => (int) $args['user_id'],
                'film_id' => (int) $args['film_id'],
                'score' => (float) $args['score'],
                'comment' => $args['comment'],
            ]);

            $statistic = FilmStatistic::query()->firstOrCreate(
                ['film_id' => (int) $args['film_id']],
                ['average_score' => 0, 'total_ratings' => 0]
            );

            $currentTotal = (int) $statistic->total_ratings;
            $newTotal = $currentTotal + 1;
            $newAverage = ($statistic->average_score * $currentTotal + (float) $args['score']) / $newTotal;

            $statistic->update([
                'average_score' => round($newAverage, 2), // Pour arrondir à 2 décimales
                'total_ratings' => $newTotal,
            ]);

            return $statistic->fresh();
        });
    }
}
