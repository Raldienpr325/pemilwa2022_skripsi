<?php

namespace App\Repositories\Psigl;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Psigl\PsiglRepository;
use App\Entities\Psigl\Psigl;
use App\Validators\Psigl\PsiglValidator;

/**
 * Class PsiglRepositoryEloquent.
 *
 * @package namespace App\Repositories\Psigl;
 */
class PsiglRepositoryEloquent extends BaseRepository implements PsiglRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Psigl::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
