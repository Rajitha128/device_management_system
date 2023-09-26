@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="page-title">Organizations</h1>
        </div>
        <div class="col-lg-12 mt-5">
            <div>
                <a href="{{ route('organizations.create') }}" class="btn btn-success">Add</a>
            </div>
            <div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col" style="text-align: center;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($organizations as $organization)
                            <tr>
                                <th scope="row">{{  $organization->id }}</th>
                                <td>{{ $organization->code }}</td>
                                <td>{{ $organization->name }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div class="btn-styles">
                                            <a href="{{ route('organizations.show', $organization->id) }}" class="btn btn-success mr-2">View</a>
                                        </div>
                                        <div class="btn-styles">
                                            <form action="{{ route('organizations.destroy', $organization->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                        <div class="btn-styles">
                                            <a href="{{ route('organizations.edit', $organization->id) }}" class="btn btn-warning">Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>


    </div>
</div>
@endsection
