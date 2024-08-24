<?php

namespace App\Repositories\PresmaFikes;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PresmaFikes\PresmaFikesRepository;
use App\Entities\PresmaFikes\PresmaFikes;
use App\Validators\PresmaFikes\PresmaFikesValidator;

/**
 * Class PresmaFikesRepositoryEloquent.
 *
 * @package namespace App\Repositories\PresmaFikes;
 */
class PresmaFikesRepositoryEloquent extends BaseRepository implements PresmaFikesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PresmaFikes::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
