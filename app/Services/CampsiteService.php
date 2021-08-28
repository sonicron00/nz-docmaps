<?php


namespace App\Services;

use App\Repositories\Contracts\CampsiteRepositoryContract;
use App\Services\DocApiService;
use Illuminate\Support\Facades\Log;

class CampsiteService
{
    public CampsiteRepositoryContract $campsiteRepositoryContract;
    protected DocApiService $docApiService;
    protected SpatialService $spatialService;

    public function __construct(CampsiteRepositoryContract $campsiteRepositoryContract, DocApiService $docApiService, SpatialService $spatialService)
    {
        $this->campsiteRepositoryContract = $campsiteRepositoryContract;
        $this->docApiService = $docApiService;
        $this->spatialService = $spatialService;
    }

    public function upsertAllByAssetId()
    {
        $campsitesCollect = $this->docApiService->getAllAssets('campsites');
        $campsitesCollect->each(
            function ($campsiteData) {
                $translatedCoordinates = $this->spatialService->convert($campsiteData->x, $campsiteData->y);
                $campsite = [
                    'assetId' => $campsiteData->assetId,
                    'name' => $campsiteData->name,
                    'status' => $campsiteData->status,
                    'region' => $campsiteData->region,
                    'x' => $translatedCoordinates['latitude'],
                    'y' => $translatedCoordinates['longitude']
                ];

                $this->campsiteRepositoryContract->updateOrCreate($campsite);
            }
        );
    }

}