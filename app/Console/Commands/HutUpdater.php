<?php


namespace App\Console\Commands;

use App\Services\HutService;
use Illuminate\Console\Command;

class HutUpdater extends Command
{
    protected $signature = 'update:huts';

    public HutService $hutService;

    public function __construct(HutService $hutService)
    {
        parent::__construct();
        $this->hutService = $hutService;
    }

    public function handle(): int
    {
        $this->hutService->upsertAllByAssetId();
        return 0;
    }

}