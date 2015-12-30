@extends('layout')

@section('content')
    <h3>Organizations</h3>

    <table class="table table-responsive table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Groups</th>
            @if(Sentry::getUser()->isSuperUser())<th>Action</th>@endif
        </tr>
        </thead>
        <tbody>
        @foreach($users as $u)
            <tr>
                <td>{{ $u->first_name }} {{ $u->last_name  }}</td>
                <td>{{ $u->email  }}</td>
                <td>{{ $u->phone  }}</td>
                <td>@foreach(json_decode($u->getGroups(), true) as $g) {{ $g['name'] }}<br /> @endforeach</td>
                @if(Sentry::getUser()->isSuperUser())<td>
                    <a href="javascript:deleteUser('{{ $u->id }}');" class="btn btn-xs btn-danger">Delete</a>
                    <a href="{{ route('users.edit', $u->id)  }}" class="btn btn-xs btn-success">Edit</a>
                </td>@endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection