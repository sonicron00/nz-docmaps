<?php


namespace App\Console\Commands;

use App\Services\CampsiteService;
use Illuminate\Console\Command;

class CampsitesUpdater extends Command
{
    protected $signature = 'update:campsites';

    public CampsiteService $campsiteService;

    public function __construct(CampsiteService $campsiteService)
    {
        parent::__construct();
        $this->campsiteService = $campsiteService;
    }

    public function handle(): int
    {
        $this->campsiteService->upsertAllByAssetId();
        return 0;
    }

}