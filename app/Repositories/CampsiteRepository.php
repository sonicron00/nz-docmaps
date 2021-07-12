<?php


namespace App\Repositories;

use App\Models\Campsite;
use App\Repositories\Contracts\CampsiteRepositoryContract;


class CampsiteRepository extends BaseRepository implements CampsiteRepositoryContract
{
    public function __construct(Campsite $model)
    {
        parent::__construct($model);
    }

    public function updateOrCreate(array $campsite): void
    {
        $this->model->updateOrCreate($campsite);
    }

}