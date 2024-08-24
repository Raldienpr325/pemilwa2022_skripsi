<?php

namespace App\Entities\PresmaFikes;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PresmaFikes.
 *
 * @package namespace App\Entities\PresmaFikes;
 */
class PresmaFikes extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

}
