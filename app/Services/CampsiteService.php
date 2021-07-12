<?php


namespace App\Services;

use App\Repositories\Contracts\CampsiteRepositoryContract;
use App\Services\DocApiService;
use Illuminate\Support\Facades\Log;

class CampsiteService
{
    protected CampsiteRepositoryContract $campsiteRepositoryContract;
    protected DocApiService $docApiService;

    public function __construct(CampsiteRepositoryContract $campsiteRepositoryContract, DocApiService $docApiService)
    {
        $this->campsiteRepositoryContract = $campsiteRepositoryContract;
        $this->docApiService = $docApiService;
    }

    public function upsertAllByAssetId()
    {
        $campsitesCollect = $this->docApiService->getAllAssets('campsite');
        $campsitesCollect->each(
            function ($campsiteData) {
                $campsite = [
                    'assetId' => $campsiteData->assetId,
                    'name' => $campsiteData->name,
                    'status' => $campsiteData->status,
                    'region' => $campsiteData->region,
                    'x' => $campsiteData->x,
                    'y' => $campsiteData->y
                ];
                $this->campsiteRepositoryContract->updateOrCreate($campsite);
            }
        );
    }

}