<?php

namespace App\Http\Controllers;

use App\Interfaces\OrganizationRepositoryInterface;
use App\Http\Requests\OrganizationRequest;
use Exception;

class OrganizationController extends Controller
{
    private $organizationRepository;

    public function __construct(OrganizationRepositoryInterface $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    public function index()
    {
        $organizations = $this->organizationRepository->findAll();

        return view('pages.organizations.index')->with(['organizations'=> $organizations]);
    }

    public function create()
    {
        return view('pages.organizations.create');
    }

    public function store(OrganizationRequest $request)
    {
        try{
            $data = $request->validated();

            $this->organizationRepository->create($data);

            return redirect()->route('organizations.index')->with('success', 'Organization created successfully.');
        }catch(Exception $e){
            \Log::error('OrganizationController(store): '.$e->getMessage());
            return redirect()->back()->with(['flash_message' => 'Something went wrong!']);
        }
    }

    public function show($id)
    {
        try{
            $organization = $this->organizationRepository->find($id);
            $locations = $organization->locations()->get();

            return view('pages.organizations.show')->with(['organization'=> $organization,'locations'=> $locations]);
        }catch(Exception $e){
            \Log::error('OrganizationController(show): '.$e->getMessage());
            return redirect()->back()->with(['flash_message' => 'Something went wrong!']);
        }
    }

    public function edit($id)
    {
        $organization = $this->organizationRepository->find($id);

        return view('pages.organizations.edit', ['organization'=> $organization]);
    }

    public function update(OrganizationRequest $request, $id)
    {
        try{
            $organization = $this->organizationRepository->findOrFail($id);

            $organization->code = $request->code;
            $organization->name = $request->name;

            $organization->save();

            return redirect()->route('organizations.index')->with('success', 'Organization updated successfully.');

        }catch(Exception $e){
            \Log::error('OrganizationController(update): '.$e->getMessage());
            return redirect()->back()->with(['flash_message' => 'Something went wrong!']);
        }
    }


    public function destroy($id)
    {
        try{
            $this->organizationRepository->deleteById($id);

            return redirect()->route('organizations.index')->with('success', 'Organization deleted successfully.');

        }catch(Exception $e){
            \Log::error('OrganizationController(destroy): '.$e->getMessage());
            return redirect()->back()->with(['flash_message' => 'Something went wrong!']);
        }
    }
}
