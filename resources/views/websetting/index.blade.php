@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Site Settings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('admin/settings/update') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label>Site Logo</label><br>
            @if($logo && $logo->value)
                <img src="{{ asset($logo->value) }}" height="80"><br><br>
            @endif
            <input type="file" name="site_logo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Logo</button>
    </form>
</div>
@endsection
