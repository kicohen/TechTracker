@extends('layout')

@section('content')
    <h3>Organizations</h3>

    <table class="table table-responsive table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Events</th>
            @if(Sentry::getUser()->isSuperUser())<th>Action</th>@endif
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $g)
            <tr>
                <td>{{ $g->name  }}</td>
                <td></td>
                @if(Sentry::getUser()->isSuperUser())<td>
                    <a href="javascript:deleteOrganization('{{ $g->id }}');" class="btn btn-xs btn-danger">Delete</a>
                    <a href="{{ route('groups.edit', $g->id)  }}" class="btn btn-xs btn-success">Edit</a>
                </td>@endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection