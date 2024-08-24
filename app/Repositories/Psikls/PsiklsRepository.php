<?php

namespace App\Repositories\Testing;

use App\Models\Mahasiswapsikl;
use App\Repositories\BaseRepositoryEloquent;

class PsiklsRepository extends BaseRepositoryEloquent implements PsiklsRepositoryEloquent
{
    public function __construct(Mahasiswapsikl $model)
    {
        parent::__construct($model);
    }

}
