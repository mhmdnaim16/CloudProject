<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
class Movie extends Model
{
    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'production_date',
        'duration',
        'genre',
        'synopsis',
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
