<?php


namespace App\Repositories;

/**
 * Class BaseRepositoryEloquent
 * @package App\Repositories
 */
class BaseRepositoryEloquent
{
    /**
     * @var $model = Model yang digunakan pada repositoru ini.
     */
    protected $model;

    /**
     *
     * Constructor, Parameter Model
     *
     * @param $model
     *
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     *
     * Get Data Single dengan menggunakan primary key
     *
     * @param int $primaryKey
     * @return mixed
     */
    public function getByPrimaryKey(int $primaryKey)
    {
        return $this->model->find($primaryKey);
    }

    /**
     *
     * Get Data dengan parameter id
     *
     * @param string $column
     * @param $value
     * @return mixed
     */
    public function getByColumn(string $column, $value)
    {
        return $this->model->where($column, $value)->first();
    }

    /**
     *
     * Get Data dengan Beberapa Parameter Array
     *
     * $params['select']
     * $params['where']
     * $params['where_in']
     * $params['sort_by']
     * $params['offset']
     * $params['limit']
     * $params['relations']
     *
     * @param array $params
     * @return mixed
     */

    public function getAllData(array $params = [])
    {
        $model = $this->model;
        if (isset($params['relations'])) {
            $model =  $model->with($params['relations']);
        }

        # Jika mau Seleksi beberapa kolom saja
        if (isset($params['select'])) {
            $model = $model->select($params['select']);
        }

        #inner join
        if (isset($params['join'])) {
            $model = $model->join($params['join']['table'], $params['join']['condition']);
        }

        #left join
        if (isset($params['left_join'])) {
            $model = $model->leftJoin($params['left_join']['table'], $params['left_join']['condition']);
        }

        # Jika mau mencari sesuatu single
        if (isset($params['where'])) {
            $model = $model->where($params['where']);
        }

        # Jika mau mencari data yang ada di relation dengan where in
        if (isset($params['where_in'])) {
            $model = $model->whereIn($params['where_in']);
        }

        /* Scope */
        if (isset($params['scope'])) {
            $model = $this->modelScope($params['scope'], $model);
        }

        #Order By
        if (isset($params['order_by'])) {
            foreach ($params['order_by'] as $order) {
                $model = $model->orderBy($order['column'], $order['direction']);
            }
        }

        #Group By
        if (isset($params['group_by'])) {
            $model = $model->groupBy($params['group_by']);
        }

        /* Bawah Sendiri */
        if (isset($params['count'])) {
            return $model->count();
        }

        if (isset($params['sum'])) {
            return $model->sum($params['sum']);
        }

        if (isset($params['single'])) {
            return $model->first();
        }

        if (isset($params['find'])) {
            return $model->find($params['find']);
        }

        if (isset($params['paginate'])) {
            return $model->paginate($params['paginate']);
        }

        # Jika menggunakan limit dan offset
        if (isset($params['limit'])) {
            $offset = 0;
            if (isset($params['offset'])) {
                $offset = $params['offset'];
            }

            return $model->offset($offset)->limit($params['limit'])->get();
        }
        return $model->get();

        /* End Bawah Sendiri */
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        $model = new $this->model;
        $model = $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param int $primaryKey
     * @param $data
     * @return mixed
     */
    public function updateByPrimaryKey(int $primaryKey, $data)
    {
        $model = $this->model->find($primaryKey);
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param string $column
     * @param $value
     * @param $data
     * @return mixed
     */
    public function updateByColumn(string $column, $value, $data)
    {
        $model = $this->model->where($column, $value)->first();
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param int $primaryKey
     * @return bool
     */
    public function deleteByPrimaryKey(int $primaryKey)
    {
        $model = $this->model->find($primaryKey);

        if ($model) {
            return $model->delete();
        }
        return false;
    }

    /**
     * @param string $column
     * @param $value
     * @return bool
     */
    public function deleteByColumnKey(string $column, $value)
    {
        $model = $this->model->where($column, $value)->first();

        if ($model) {
            return $model->delete();
        }
        return false;
    }

    protected function modelScope($params, $model)
    {
        return $model;
    }
}
