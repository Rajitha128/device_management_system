<?php

namespace App\Repositories;


use App\Models\Organization;
use App\Interfaces\OrganizationRepositoryInterface;

class OrganizationRepository extends BaseRepository implements OrganizationRepositoryInterface
{
    public function __construct(Organization $model)
    {
        $this->model = $model;
    }
}
