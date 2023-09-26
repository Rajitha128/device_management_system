@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="page-title">Edit Device</h3>
        </div>
        <div class="col-lg-12 mt-5">
            <form action="{{ route('devices.update', $device->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="location_id">Location Id:</label>
                    <input type="text" class="form-control" id="location_id" name="location_id" value="{{ $device->location_id }}" readonly>
                </div>
                <br>
                <div class="form-group">
                    <label for="number">Number:</label>
                    <input type="number" class="form-control" id="number" name="number" value="{{ $device->number }}" required>
                </div>
                <br>
                <div class="form-group">
                    {{-- TODO: store the device types in the database and fetch and list them here instead of hardcoding --}}
                    <label for="type">Type:</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="">Select a Type</option>
                        <option value="1" {{ $device->type == 1 ? 'selected' : '' }}>POS</option>
                        <option value="2" {{ $device->type == 2 ? 'selected' : '' }}>KIOSK</option>
                        <option value="3" {{ $device->type == 3 ? 'selected' : '' }}>Digital Signage</option>
                    </select>
                </div>
                <br>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <div>
                        @if ($device->image)
                            <img src="{{ asset('storage/' . $device->image) }}" alt="Current Image" style="max-width: 200px;">
                        @else
                            <p>No image uploaded</p>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="new_image">Upload New Image:</label>
                    <input type="file" class="form-control-file" id="new_image" name="new_image" accept="image/*">
                </div>
                <br>

                <div class="form-group">
                    <label>Status:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_active" value="1" {{ $device->status == 1 ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_active">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" {{ $device->status == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_inactive">Inactive</label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Update Device</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
