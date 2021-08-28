<?php


namespace App\Http\Controllers;

use App\Services\HutService as Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;


class HutController extends Controller
{
    /**
     * Hut Service
     *
     * @var Service $service
     */
    private Service $service;

    /**
     * HutController constructor.
     *
     * @param Service $service - Hut Service
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Return all huts for map marking
     *
     * @return Collection
     */
    public function getHutMarkers()
    {
        return $this->service->getHuts();
    }

}