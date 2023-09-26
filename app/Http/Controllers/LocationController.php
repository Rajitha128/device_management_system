<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\LocationRepositoryInterface;
use App\Http\Requests\LocationRequest;
use Exception;

class LocationController extends Controller
{
    private $locationRepository;

    public function __construct(LocationRepositoryInterface $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function create($organizationId)
    {
        return view('pages.locations.create',['organizationId' => $organizationId]);
    }

    public function store(LocationRequest $request)
    {
        try{
            $data = $request->validated();

            $this->locationRepository->create($data);

            return redirect()->route('organizations.show',$data['organization_id'])->with('success', 'Organization created successfully.');

        }catch(Exception $e){
            \Log::error('LocationController(store): '.$e->getMessage());
            return redirect()->back()->with(['flash_message' => 'Something went wrong!']);
        }
    }

    public function show($id)
    {
        $location = $this->locationRepository->find($id);

        $devices = $location->devices()->get();

        return view('pages.locations.show')->with(['location'=> $location,'devices'=> $devices]);
    }

    public function edit($id)
    {
        $location = $this->locationRepository->find($id);

        return view('pages.locations.edit', ['location'=> $location]);
    }

    public function update(LocationRequest $request, $id)
    {
        try{
            $location = $this->locationRepository->findOrFail($id);

            $location->serial_number = $request->serial_number;
            $location->name = $request->name;
            $location->ipv4_address = $request->ipv4_address;

            $location->save();

            return redirect()->route('organizations.show', $location->organization_id)->with('success', 'Location updated successfully.');
        }catch(Exception $e){
            \Log::error('LocationController(update): '.$e->getMessage());
            return redirect()->back()->with(['flash_message' => 'Something went wrong!']);
        }
    }


    public function destroy($id)
    {
        try{
            $this->locationRepository->deleteById($id);

            return redirect()->back()->with('success', 'Location deleted successfully.');
        }catch(Exception $e){
            \Log::error('LocationController(destroy): '.$e->getMessage());
            return redirect()->back()->with(['flash_message' => 'Something went wrong!']);
        }
    }
}
