<?php

namespace Domain;

use Domain\Core\ValueObjects\UuidModel;
use Domain\Entities\Collection;
use Domain\Entities\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Art extends Model
{
    use UuidModel;

    protected $table = 'art';

    /**
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'name',
        'image',
        'description',
    ];

    /**
     * @return HasMany
     */
    public function Comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return HasOne
     */
    public function collection(): HasOne
    {
        return $this->hasOne(Collection::class);
    }
}