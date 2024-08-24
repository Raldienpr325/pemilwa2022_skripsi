<?php

namespace App\Repositories\DpmFK;

use App\Repositories\BaseRepositoryInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

interface DpmFKRepositoryEloquent extends BaseRepositoryInterface
{
    public function chartPresma();
    public function chartDpm();
}

