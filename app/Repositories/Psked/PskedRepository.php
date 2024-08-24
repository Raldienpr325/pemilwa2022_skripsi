<?php

namespace App\Repositories\Psked;

use App\Models\Mahasiswapsked;
use App\Repositories\BaseRepositoryEloquent;
use App\Repositories\Psked\PskedRepositoryEloquent;

class PskedRepository extends BaseRepositoryEloquent implements PskedRepositoryEloquent
{
    public function __construct(Mahasiswapsked $model)
    {
        parent::__construct($model);
    }

}
