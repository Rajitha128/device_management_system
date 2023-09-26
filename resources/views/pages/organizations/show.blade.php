@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="panel panel-default">
                    <div class="panel panel-heading">
                        <h4 class="panel-title">Organization</h4>
                    </div>
                    <div class="panel panel-body">
                        <div class="form-group col-md-6 text-center" style="margin: 0 auto;">
                            <ul class="list-group">
                                <li class="list-group-item">Id: {{ $organization->id }}</li>
                                <li class="list-group-item">Code: {{ $organization->code }}</li>
                                <li class="list-group-item">Name: {{ $organization->name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>

                </div>
                <div class="text-start">
                    <div>
                        <h4 class="panel-title">Locations of {{ $organization->name }}</h4>
                    </div>
                    <div>
                        <a href="{{ route('locations.create', ['organization_id' => $organization->id]) }}" class="btn btn-success">Add Location</a>
                    </div>
                </div>

                <div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Serial Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">IPV4 Address</th>
                            <th scope="col"style="text-align: center;">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($locations as $location)
                                <tr>
                                    <th scope="row">{{  $location->id }}</th>
                                    <td>{{ $location->serial_number }}</td>
                                    <td>{{ $location->name }}</td>
                                    <td>{{ $location->ipv4_address }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <div class="btn-styles">
                                                <a href="{{ route('locations.show', $location->id) }}" class="btn btn-success mr-2">View</a>
                                            </div>
                                            <div class="btn-styles">
                                                <form action="{{ route('locations.destroy', $location->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                            <div class="btn-styles">
                                                <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
                <a href="{{ route('organizations.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
