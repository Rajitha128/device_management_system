<?php

namespace App\Repositories;


use App\Models\Device;
use App\Interfaces\DeviceRepositoryInterface;
use Illuminate\Http\Request;

class DeviceRepository extends BaseRepository implements DeviceRepositoryInterface
{
    public function __construct(Device $model)
    {
        $this->model = $model;
    }

    public function saveImage(Request $request)
    {
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            //better to store the images in the S3 bucket or any other storage instead of in the project folder
            $imagePath = $image->store('images', 'public');

            return $imagePath;
        }

        return null;
    }
}
