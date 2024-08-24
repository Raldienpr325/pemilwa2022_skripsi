<?php

namespace App\Repositories\Pskb;

use App\Models\Mahasiswapskb;
use App\Repositories\BaseRepositoryEloquent;
use App\Models\User;

class PskbRepository extends BaseRepositoryEloquent implements PskbRepositoryEloquent
{
    public function __construct(Mahasiswapskb $model)
    {
        parent::__construct($model);
    }

}
