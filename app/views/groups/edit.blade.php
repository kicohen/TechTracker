@extends('layout')

@section('content')
    <h3>Organizations</h3>

    <div class="panel panel-default">
        <div class="panel-heading">Edit</div>
        <div class="panel-body">
            {{ Form::open(array('route' => ['groups.update', $group->id], 'method' => 'put')) }}
                <div class="form-group">
                    <input type="text" name="name" value="{{ $group->name  }}" class="form-control" placeholder="Name">
                </div>

                <div class="form-group">
                    <input type="submit" class="form-control btn btn-primary" />
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection