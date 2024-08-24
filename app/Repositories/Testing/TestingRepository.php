<?php

namespace App\Repositories\Testing;

use App\Models\Admin;
use App\Repositories\BaseRepositoryEloquent;
use App\Models\User;

class TestingRepository extends BaseRepositoryEloquent implements TestingRepositoryEloquent
{
    public function __construct(Admin $model)
    {
        parent::__construct($model);
    }

    public function testing()
    {
        $data = $this->getAllData([
            'where' => [
                'id' => 1
            ]
        ]);

        return $data;
    }
}
