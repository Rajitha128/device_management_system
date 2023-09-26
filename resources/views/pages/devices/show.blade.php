@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="panel panel-default">
                    <div class="panel panel-heading">
                        <h4 class="panel-title">Device</h4>
                    </div>
                    <div class="panel panel-body">
                        <div class="form-group col-md-6 text-center" style="margin: 0 auto;">
                            <ul class="list-group">
                                <li class="list-group-item">Id: {{ $device->id }}</li>
                                <li class="list-group-item">Number: {{ $device->number }}</li>
                                <li class="list-group-item">Type: {{ $device->type }}</li>
                                <li class="list-group-item">
                                    Image:
                                    <div>
                                        <img src="{{ asset('storage/'.$device->image) }}" alt="" style="max-width: 500px; height: auto;">
                                    </div>
                                </li>
                                <li class="list-group-item">Status:
                                    @if ($device->status == 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="{{ route('locations.show', $device->location_id) }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
