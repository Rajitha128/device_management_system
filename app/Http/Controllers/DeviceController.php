<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\DeviceRepositoryInterface;
use App\Http\Requests\DeviceRequest;
use Exception;

class DeviceController extends Controller
{
    private $deviceRepository;

    public function __construct(DeviceRepositoryInterface $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }

    public function create($locationId)
    {
        //TODO: store the device types in DB and fetch when needed
        return view('pages.devices.create',['locationId' => $locationId]);
    }

    public function store(DeviceRequest $request)
    {
        try{
            $data = $request->validated();

            $imagePath = $this->deviceRepository->saveImage($request);

            $data['image'] = $imagePath;

            $this->deviceRepository->create($data);

            return redirect()->route('locations.show',$data['location_id'])->with('success', 'Device created successfully.');

        }catch(Exception $e){
            \Log::error('DeviceController(store): '.$e->getMessage());
            return redirect()->back()->with(['flash_message' => 'Something went wrong!']);
        }
    }

    public function show($id)
    {
        $device = $this->deviceRepository->find($id);

        return view('pages.devices.show')->with(['device'=> $device]);
    }

    public function edit($id)
    {
        $device = $this->deviceRepository->find($id);

        return view('pages.devices.edit', ['device'=> $device]);
    }

    public function update(Request $request, $id)
    {
        try{
            $device = $this->deviceRepository->findOrFail($id);

            $device->number = $request->number;
            $device->type = $request->type;
            $device->status = $request->status;

            if ($request->hasFile('image')) {
                $imagePath = $this->deviceRepository->saveImage($request);
                $device->image = $imagePath;
            }

            $device->save();

            return redirect()->route('devices.show', $device->id)->with('success', 'Device updated successfully.');

        }catch(Exception $e){
            \Log::error('DeviceController(update): '.$e->getMessage());
            return redirect()->back()->with(['flash_message' => 'Something went wrong!']);
        }
    }

    public function destroy($id)
    {
        $this->deviceRepository->deleteById($id);

        return redirect()->back()->with('success', 'Device deleted successfully.');
    }
}
