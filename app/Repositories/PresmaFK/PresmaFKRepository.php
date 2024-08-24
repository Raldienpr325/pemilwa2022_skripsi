<?php

namespace App\Repositories\PresmaFK;

use App\Models\PresmaFK;
use App\Repositories\BaseRepositoryEloquent;

class PresmaFKRepository extends BaseRepositoryEloquent implements PresmaFKRepositoryEloquent
{
    public function __construct(PresmaFK $model)
    {
        parent::__construct($model);
    }

}
