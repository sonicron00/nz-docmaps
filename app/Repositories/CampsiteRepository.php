<?php


namespace App\Repositories;

use App\Models\Campsite;
use App\Repositories\Contracts\CampsiteRepositoryContract;
use App\Repositories\BaseRepository;


class CampsiteRepository extends BaseRepository implements CampsiteRepositoryContract
{
    public function __construct(Campsite $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


}