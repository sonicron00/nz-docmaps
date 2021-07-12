<?php


namespace App\Services;

use App\Repositories\Contracts\HutRepositoryContract;
use App\Services\DocApiService;
use Illuminate\Support\Facades\Log;

class HutService
{
    public hutRepositoryContract $hutRepositoryContract;
    protected DocApiService $docApiService;

    public function __construct(hutRepositoryContract $hutRepositoryContract, DocApiService $docApiService)
    {
        $this->hutRepositoryContract = $hutRepositoryContract;
        $this->docApiService = $docApiService;
    }

    public function upsertAllByAssetId()
    {
        $hutsCollect = $this->docApiService->getAllAssets('huts');
        $hutsCollect->each(
            function ($hutData) {
                $hut = [
                    'assetId' => $hutData->assetId,
                    'name' => $hutData->name,
                    'status' => $hutData->status,
                    'region' => $hutData->region,
                    'x' => $hutData->x,
                    'y' => $hutData->y
                ];

                $this->hutRepositoryContract->updateOrCreate($hut);
            }
        );
    }

}