<?php


namespace App\Contracts\Repositories;


use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'desc');

    public function find(int $id);

    public function findOneOrFail(int $id);

    public function findBy(array $data);

    public function findOneBy(array $data);

    public function findOneByOrFail(array $data);

    public function insertOrIgnore(array $attribute);

}