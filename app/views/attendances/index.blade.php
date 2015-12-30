@extends('layout')

@section('content')
    <h3>Attendance</h3>
    <p>Here we have listed all of your reported absences so that they can be cleared in the attendance office. Please make sure to update this system before your absence if that is even possible but no later than 2 days after your absence.</p>

    <table class="table table-responsive table-hover">
        <thead>
            <tr>
                <th>Date</th>
                <th>Period</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($attendances as $a)
            <tr>
                <td>{{ date("m-d-Y", $a->date)  }}</td>
                <td>{{ $a->period  }}</td>
                <td>{{ $a->reason  }}</td>
                <td>@if($a->approved == 0)<span class="label label-danger">Not Approved</span> @elseif($a->approved == 1) <span class="label label-warning">Approved</span> @elseif($a->approved == 2) <span class="label label-success">Cleared</span> @endif</td>
                <td><a href="javascript:deleteUser('{{ $a->id }}');" class="btn btn-danger btn-xs">Delete</a>@if(Sentry::getUser()->isSuperUser() && $a->approved == 0) <a href="{{ route('attendances.approve', $a->id)  }}" class="btn btn-warning btn-xs">Approve</a>@elseif(Sentry::getUser()->isSuperUser() && $a->approved == 1) <a href="{{ route('attendances.approve', $a->id)  }}" class="btn btn-success btn-xs">Clear</a>@endif</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="attandances" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Attendance</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('attendances.store')  }}" method="POST">
                        <div class="form-group">
                            <input type="text" name="date" class="form-control" placeholder="Date of Absence" id="datepicker">
                        </div>

                        <div class="form-group">
                            <input type="text" name="period" class="form-control" placeholder="Period">
                        </div>

                        <div class="form-group">
                            <textarea name="reason" class="form-control" placeholder="Reason"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection