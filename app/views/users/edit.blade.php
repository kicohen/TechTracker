@extends('layout')

@section('content')
    <h3>Organizations</h3>

    <div class="panel panel-default">
        <div class="panel-heading">Edit</div>
        <div class="panel-body">
            {{ Form::open(array('route' => ['users.update', $user->id], 'method' => 'put')) }}
            <div class="form-group">
                <input type="email" name="email" value="{{ $user->email  }}" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" name="password"  class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="text" name="first_name" value="{{ $user->first_name  }}" class="form-control" placeholder="First Name">
            </div>
            <div class="form-group">
                <input type="text" name="last_name" value="{{ $user->last_name  }}" class="form-control" placeholder="Last Name">
            </div>
            <div class="form-group">
                <input type="text" name="phone" value="{{ $user->phone  }}" class="form-control" placeholder="(xxx)xxx-xxxx">
            </div>
            <hr />
            <div class="form-group">
                <input type="password" name="current"  class="form-control" placeholder="Current Password">
            </div>

            <div class="form-group">
                <input type="submit" class="form-control btn btn-primary" />
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection