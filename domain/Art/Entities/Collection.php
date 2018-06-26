<?php

namespace Domain\Entities;

use Domain\Art;
use Domain\Core\ValueObjects\UuidModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use UuidModel;

    /**
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'title',
        'body',
    ];

    /**
     * @return HasMany
     */
    public function art(): HasMany
    {
        return $this->hasMany(Art::class);
    }
}