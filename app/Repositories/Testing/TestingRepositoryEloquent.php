<?php

namespace App\Repositories\Testing;

use App\Repositories\BaseRepositoryInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

interface TestingRepositoryEloquent extends BaseRepositoryInterface
{
    public function testing();
}

