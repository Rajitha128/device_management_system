@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissable">
        <strong>{{ $message }}</strong>
</div>
@endif


{{-- @if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissable">
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissable">
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissable">
	<strong>{{ $message }}</strong>
</div>
@endif --}}


@if ($errors->any())
<div class="alert alert-danger alert-dismissable">
    {{-- <strong>Please check the form below for errors:</strong> --}}
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
