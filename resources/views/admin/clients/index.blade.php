@extends('layouts.dashboard')
@section('style')
    <style>
        span.label{
            font-size: 12px; !important;
        }
        td,th{
            font-size: 14px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/cus.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/bootstrap-popover-x.min.css') }}">
@endsection
@section('content')
 <script type="text/javascript">
        jQuery( document ).ready( function( $ ) {
            var $table4 = jQuery( "#table-4" );

            $table4.DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );
    </script>
<div class="container mt-4">
    <h2>All Clients</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped table-hover table-bordered datatable" id="table-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>PAN</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->ID_Number }}</td>
                    <td>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="{{ route('clients.destroy', $client->id) }}" style="display:inline-block;">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" onclick="return confirm('Delete this client?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


@section('scripts')

  <script src="{{ asset('assets/dashboard/js/bootstrap-popover-x.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/datatables.css') }}">

    <script src="{{ asset('assets/dashboard/js/datatables.js') }}"></script>

@endsection