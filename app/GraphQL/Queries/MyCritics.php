<?php

namespace App\GraphQL\Queries;

use App\Models\Critic;

class MyCritics
{
    /** @param  array<string, mixed>  $args */
    public function __invoke(null $_, array $args)
    {
        return Critic::query()->get();
    }
}
