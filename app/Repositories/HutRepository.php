<?php


namespace App\Repositories;

use App\Models\Hut;
use App\Repositories\Contracts\HutRepositoryContract;
use App\Repositories\BaseRepository;


class HutRepository extends BaseRepository implements HutRepositoryContract
{
    public function __construct(Hut $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

}