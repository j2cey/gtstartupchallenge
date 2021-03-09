<?php

namespace App\Traits\Base;


trait BaseTrait
{
    use Uuidable, StatusTrait;

    public static function bootBaseTrait()
    {
        static::creating(function ($model) {
            if (is_null($model->status_id)) {
                $model->setDefaultStatus();
            }
        });
    }
}
