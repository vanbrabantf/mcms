<?php

namespace Domain\Core\Observers;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class UuidObserver
{
    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function creating(Model $model): Model
    {
        if (!$model->id) {
            $model->id = Uuid::uuid4()->toString();
        }
        return $model;
    }
}