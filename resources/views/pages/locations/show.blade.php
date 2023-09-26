@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="panel panel-default">
                    <div class="panel panel-heading">
                        <h4 class="panel-title">Location</h4>
                    </div>
                    <div class="panel panel-body">
                        <div class="form-group col-md-6 text-center" style="margin: 0 auto;">
                            <ul class="list-group">
                                <li class="list-group-item">Id: {{ $location->id }}</li>
                                <li class="list-group-item">Serial Number: {{ $location->serial_number }}</li>
                                <li class="list-group-item">Name: {{ $location->name }}</li>
                                <li class="list-group-item">IP Address: {{ $location->ipv4_address }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="text-start">
                    <div>
                        <h4 class="panel-title">Devices of {{ $location->name }}</h4>
                    </div>
                    <div>
                        <a href="{{ route('devices.create', ['location_id' => $location->id]) }}" class="btn btn-success">Add Device</a>
                    </div>
                </div>
                <div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Number</th>
                            <th scope="col">type</th>
                            <th scope="col">image</th>
                            <th scope="col">status</th>
                            <th scope="col">created_date</th>
                            <th scope="col" style="text-align: left;">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($devices as $device)
                                <tr>
                                    <th scope="row">{{  $device->id }}</th>
                                    <td>{{ $device->number }}</td>
                                    <td>{{ $device->type }}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$device->image) }}" alt="" style="max-width: 100px; height: auto;">
                                    </td>
                                    <td>
                                        @if ($device->status == 1)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                    <td>{{ $device->created_at }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <div class="btn-styles">
                                                <a href="{{ route('devices.show', $device->id) }}" class="btn btn-success">View</a>
                                            </div>
                                            <div class="btn-styles">
                                                <form action="{{ route('devices.destroy', $device->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                            <div class="btn-styles">
                                                <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-warning">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
                <a href="{{ route('organizations.show',$location->organization_id) }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
