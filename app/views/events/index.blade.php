@extends('layout')

@section('content')
    <h3>Events</h3>

    <table class="table table-responsive table-hover">
        <thead>
        <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Location, Equipment</th>
            <th>Timing</th>
            <th>Roles</th>
            @if(Sentry::getUser()->isSuperUser())<th>Action</th>@endif
        </tr>
        </thead>
        <tbody>
        @foreach($events as $e)
            <tr @if(strtolower($e->status) == "event confirmed") class="success" @else class="danger" @endif>
                <td><a href="{{ route('events.show', $e->id)  }}">asd</a><br >({{ strtolower($e->status) }} ,@if($e->publish == 0)<b>not published</b>@elseif($e->publish == 1)published @endif)</td>
                <td>{{ $e->title  }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection