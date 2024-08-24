<?php

namespace App\Repositories\DpmFikes;

use App\Repositories\BaseRepositoryInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

interface DpmFikesRepositoryEloquent extends BaseRepositoryInterface
{
    public function chartDPM();
    public function chartPresma();
}

