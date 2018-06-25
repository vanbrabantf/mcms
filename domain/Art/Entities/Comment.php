<?php

namespace Domain\Entities;

use Domain\Art;
use Domain\Core\ValueObjects\UuidModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use UuidModel;

    /**
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'title',
        'body',
        'cover_art',
        'art_id',
    ];

    /**
     * @return BelongsTo
     */
    public function art(): BelongsTo
    {
        return $this->belongsTo(Art::class, 'art_id');
    }
}