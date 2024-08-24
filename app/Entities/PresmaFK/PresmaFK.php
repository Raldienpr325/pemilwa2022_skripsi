<?php

namespace App\Entities\PresmaFK;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PresmaFK.
 *
 * @package namespace App\Entities\PresmaFK;
 */
class PresmaFK extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

}
