<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmStatistic extends Model
{
    use HasFactory;

    protected $table = 'film_statistics';

    protected $fillable = [
        'film_id',
        'average_score',
        'total_ratings'
    ];

    protected $casts = [
        'average_score' => 'decimal:2',
        'total_ratings' => 'integer',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
