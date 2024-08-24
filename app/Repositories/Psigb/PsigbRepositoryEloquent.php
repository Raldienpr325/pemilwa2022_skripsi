<?php

namespace App\Repositories\Psigb;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Psigb\PsigbRepository;
use App\Entities\Psigb\Psigb;
use App\Validators\Psigb\PsigbValidator;

/**
 * Class PsigbRepositoryEloquent.
 *
 * @package namespace App\Repositories\Psigb;
 */
class PsigbRepositoryEloquent extends BaseRepository implements PsigbRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Psigb::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
