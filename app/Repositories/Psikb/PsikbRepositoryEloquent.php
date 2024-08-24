<?php

namespace App\Repositories\Psikb;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Psikb\PsikbRepository;
use App\Entities\Psikb\Psikb;
use App\Validators\Psikb\PsikbValidator;

/**
 * Class PsikbRepositoryEloquent.
 *
 * @package namespace App\Repositories\Psikb;
 */
class PsikbRepositoryEloquent extends BaseRepository implements PsikbRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Psikb::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
