<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Actor;
use App\Models\Film;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;

class AddActorAsAdmin
{
    /** @param  array<string, mixed>  $args */
    public function __invoke(null $_, array $args): Actor
    {
        $user = auth()->user();

        if (($user?->role?->name ?? '') !== 'ADMIN') {
            throw new AuthorizationException('Admin access required.');
        }

        $actor = Actor::query()->create([
            'last_name' => $args['last_name'],
            'first_name' => $args['first_name'],
            'birthdate' => $args['birthdate'] ?? null,
        ]);

        if (! empty($args['film_ids'])) {
            $actor->films()->syncWithoutDetaching($args['film_ids']);
        }

        if (! empty($args['film_images'])) {
            foreach ($args['film_images'] as $filmImage) {
                Film::query()->findOrFail((int) $filmImage['film_id'])->update(['image' => $filmImage['image']]);
            }
        }

        return $actor->load('films');
    }
}
