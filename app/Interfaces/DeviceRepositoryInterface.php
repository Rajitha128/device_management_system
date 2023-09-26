<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface DeviceRepositoryInterface
{
    public function saveImage(Request $request);
}
