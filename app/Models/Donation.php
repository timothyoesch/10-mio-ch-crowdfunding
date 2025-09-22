<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Ramsey\Uuid\Uuid;

class Donation extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'type',
        'amount',
        'supporter_id',
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
            'supporter_id' => 'integer',
        ];
    }

    public function supporter(): BelongsTo
    {
        return $this->belongsTo(Supporter::class);
    }

    /**
     * Generate new UUID when creating a new model instance.
     */
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }

    /**
     * Column that uses UUIDs.
     */
    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public static function getDonationsPerMinute(): float
    {
        return static::whereNot('supporter_id', null)->sum('amount') / 100;
    }

    public static function getTotalDonations(): float
    {
        return \App\Models\Vote::getTotalDurationInSeconds() / 60 * static::getDonationsPerMinute();
    }
}
