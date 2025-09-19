<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'begins_at',
        'ends_at',
        'active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'begins_at' => 'datetime',
            'ends_at' => 'datetime',
            'active' => 'boolean',
        ];
    }

    public function getDurationInSeconds(): int
    {
        $endsAt = $this->ends_at ?? now();
        return $this->begins_at->diffInSeconds($endsAt);
    }

    public static function getTotalDurationInSeconds(): int
    {
        return static::all()->sum(fn($vote) => $vote->getDurationInSeconds());
    }
}
