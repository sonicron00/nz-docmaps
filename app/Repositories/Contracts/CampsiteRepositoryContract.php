<?php

namespace App\Repositories\Contracts;

use App\Models\Campsite;

interface CampsiteRepositoryContract
{
    public function updateOrCreate(array $campsite): void;

}
