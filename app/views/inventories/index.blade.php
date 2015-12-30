@extends('layout')

@section('content')
    <h3>Organizations</h3>

    <table class="table table-responsive table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Stored</th>
            <th>Current<br />Location</th>
            <th>Purchase<br />Date</th>
            <th>Purchase<br />From</th>
            <th>Warranty<br />Expiration</th>
            <th>Rental<br />Price</th>
            <th>Organization</th>
            <th>Serial Numbers</th>
            @if(Sentry::getUser()->isSuperUser())<th>Action</th>@endif
        </tr>
        </thead>
        <tbody>
        @foreach($inventories as $i)
            <tr>
                <td>{{ $i->brand  }} {{ $i->name  }} x ({{ $i->quantity  }})</td>
                <td>{{ $i->location  }}</td>
                <td>{{ $i->current_location  }}</td>
                <td>{{ date("m-d-Y", $i->purchase_date)  }}</td>
                <td>{{ $i->purchase_from  }}</td>
                <td>{{ date("m-d-Y", $i->warranty_expiration) }}</td>
                <td>${{ $i->rental_price  }}</td>
                <td>{{ Group::find($i->organization_id)->name  }}</td>
                <td>{{ $i->serial_numbers  }}</td>
                @if(Sentry::getUser()->isSuperUser())<td>
                    <a href="javascript:deleteInventory('{{ $i->id }}');" class="btn btn-xs btn-danger">Delete</a>
                    <a href="{{ route('inventories.edit', $i->id)  }}" class="btn btn-xs btn-success">Edit</a>
                </td>@endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection