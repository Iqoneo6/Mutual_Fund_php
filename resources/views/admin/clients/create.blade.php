@extends('layouts.dashboard') 

@section('content')
<div class="container mt-4">
    <h2>Add New Client</h2>
    <form action="{{ route('admin.clients.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" required class="form-control">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required class="form-control">
        </div>

        <div class="form-group">
            <label>PAN Number</label>
            <input type="text" name="pan_number" class="form-control">
        </div>

        <div class="form-group">
            <label>Aadhar Number</label>
            <input type="text" name="aadhar_number" class="form-control">
        </div>

        <div class="form-group">
            <label>DOB</label>
            <input type="date" name="dob" class="form-control">
        </div>

        <div class="form-group">
            <label>Occupation</label>
            <input type="text" name="occupation" class="form-control">
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>City</label>
            <input type="text" name="city" class="form-control">
        </div>

        <div class="form-group">
            <label>State</label>
            <input type="text" name="state" class="form-control">
        </div>

        <div class="form-group">
            <label>Pincode</label>
            <input type="text" name="pincode" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-2">Register Client</button>
    </form>
</div>
@endsection
