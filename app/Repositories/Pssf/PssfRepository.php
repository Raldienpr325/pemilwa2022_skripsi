<?php

namespace App\Repositories\Pssf;

use App\Models\Mahasiswapssf;
use App\Repositories\BaseRepositoryEloquent;
use App\Models\User;

class PssfRepository extends BaseRepositoryEloquent implements PssfRepositoryEloquent
{
    public function __construct(Mahasiswapssf $model)
    {
        parent::__construct($model);
    }

}
