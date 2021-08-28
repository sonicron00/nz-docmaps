<?php


namespace App\Services;

use App\Repositories\Contracts\HutRepositoryContract;
use App\Services\DocApiService;
use Illuminate\Support\Facades\Log;

class HutService
{
    public hutRepositoryContract $hutRepositoryContract;
    protected DocApiService $docApiService;
    protected SpatialService $spatialService;

    public function __construct(
        hutRepositoryContract $hutRepositoryContract,
        DocApiService $docApiService,
        SpatialService $spatialService
    ) {
        $this->hutRepositoryContract = $hutRepositoryContract;
        $this->docApiService = $docApiService;
        $this->spatialService = $spatialService;
    }

    public function upsertAllByAssetId()
    {
        $hutsCollect = $this->docApiService->getAllAssets('huts');
        $hutsCollect->each(
            function ($hutData) {
                $translatedCoordinates = $this->spatialService->convert($hutData->x, $hutData->y);
                $hut = [
                    'assetId' => $hutData->assetId,
                    'name' => $hutData->name,
                    'status' => $hutData->status,
                    'region' => $hutData->region,
                    'x' => $translatedCoordinates['latitude'],
                    'y' => $translatedCoordinates['longitude']
                ];

                $this->hutRepositoryContract->updateOrCreate($hut);
            }
        );
    }

    public function getHuts()
    {
        return $this->hutRepositoryContract->getAll();
    }

}