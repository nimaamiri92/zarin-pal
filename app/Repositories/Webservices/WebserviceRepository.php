<?php


namespace App\Repositories\Webservices;


use App\Models\Webservice;
use App\Repositories\BaseRepository;

class WebserviceRepository extends BaseRepository
{

    public function __construct(Webservice $model)
    {
        parent::__construct($model);
    }
}