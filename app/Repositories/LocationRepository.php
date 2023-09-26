<?php

namespace App\Repositories;


use App\Models\Location;
use App\Interfaces\LocationRepositoryInterface;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface
{
    public function __construct(Location $model)
    {
        $this->model = $model;
    }
}
