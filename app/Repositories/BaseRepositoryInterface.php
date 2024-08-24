<?php


namespace App\Repositories;

interface BaseRepositoryInterface
{

    public function getByPrimaryKey(int $primaryKey);

    public function getByColumn(string $column, $value);

    public function getAllData(array $params = []);

    public function store($data);

    public function updateByPrimaryKey(int $primaryKey, $data);

    public function updateByColumn(string $column, $value, $data);

    public function deleteByPrimaryKey(int $primaryKey);

    public function deleteByColumnKey(string $column, $value);
}
