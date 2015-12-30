@extends('layout')

@section('content')
    <h3>Event</h3>

    <div class="row">

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Information</div>
                <div class="panel-body">
                    <h2 style="margin:0;">{{ $event->title  }}</h2>
                    <hr style="margin:10px;" />
                    <h3 style="margin:0;">{{ Group::find($event->organization_id)->name  }}</h3>
                    <p>@if($event->contact_name != null) {{ $event->contact_name  }} | @endif {{ $event->contact_email  }} @if($event->contact_phone != null) | {{  $event->contact_phone }} @endif</p>
                    <hr style="margin:10px;" />
                    <p>{{ $event->status  }}, @if($event->publish == 0)<b>Not Published</b>@elseif($event->publish == 1)Published @endif</p>
                </div>
            </div>
            @if(Sentry::getUser()->isSuperUser())<a href="#" data-toggle="modal" data-target="#dates-create">Add Date</a>@endif
            @foreach($dates as $d)
            <div class="panel panel-default">
                <div class="panel-heading">{{ $d->description  }}</div>
                <div class="panel-body">
                    <table class="table">
                        @if(!empty($d->calldate))
                        <tr>
                            <td>{{ date('l, M d, Y', $d->calldate)  }}</td>
                            <td>{{ date('H:i', $d->calldate)  }}</td>
                            <td>Call</td>
                            <td rowspan="@if(!empty($d->calldate) && !empty($d->startdate) && !empty($d->enddate) && !empty($d->strikedate))4 @elseif(!empty($d->calldate) && !empty($d->startdate) && !empty($d->enddate))3 @endif" style="vertical-align: middle;"><b>Location:</b><Br />{{ EventLocation::find($d->id)->name  }}</td>
                        </tr>
                        @endif
                        @if(!empty($d->startdate))
                            <tr>
                                <td>@if(!empty($d->calldate)) @if(date('l, M d, Y', $d->calldate) == date('l, M d, Y', $d->startdate)) @elseif(date('l, M d, Y', $d->calldate) != date('l, M d, Y', $d->startdate)){{ date('l, M d, Y', $d->startdate)  }} @endif @elseif(empty($d->calldate)) {{ date('l, M d, Y', $d->startdate)  }} @endif</td>
                                <td>{{ date('H:i', $d->startdate)  }}</td>
                                <td>Event Starts</td>
                                @if(empty($d->calldate))<td rowspan="3" style="vertical-align: middle;"><b>Location:</b><br />{{ EventLocation::find($d->id)->name  }}</td>@endif
                            </tr>
                        @endif
                        @if(!empty($d->enddate))
                            <tr>
                                <td>@if(!empty($d->startdate)) @if(date('l, M d, Y', $d->startdate) == date('l, M d, Y', $d->enddate)) @elseif(date('l, M d, Y', $d->startdate) != date('l, M d, Y', $d->enddate)){{ date('l, M d, Y', $d->enddate)  }} @endif @endif</td>
                                <td>{{ date('H:i', $d->enddate)  }}</td>
                                <td>Event Ends</td>
                            </tr>
                        @endif
                        @if(!empty($d->strikedate))
                            <tr>
                                <td>@if(!empty($d->startdate)) @if(date('l, M d, Y', $d->startdate) == date('l, M d, Y', $d->strikedate)) @elseif(date('l, M d, Y', $d->startdate) != date('l, M d, Y', $d->strikedate)){{ date('l, M d, Y', $d->strikedate)  }} @endif @endif</td>
                                <td>{{ date('H:i', $d->strikedate)  }}</td>
                                <td>Strike</td>
                            </tr>
                        @endif
                        @if(!empty($d->notes))
                            <tr>
                                <td colspan="4"><b>Notes</b></td>
                            </tr>
                            <tr>
                                <td colspan="4">{{ str_replace("\n", "<br />", htmlspecialchars($d->notes)) }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
            @endforeach
        </div>

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Roles</div>
                <div class="panel-body">
                    <p>
                    @foreach($roles as $r)
                        <b>{{ $r->role  }}</b>: {{ User::findOrFail($r->user_id)->email  }}@if(Sentry::getUser()->isSuperUser()) <a href="/roles/{{ $r->id  }}">Delete</a> @endif<br />
                    @endforeach
                    </p>
                    @if(Sentry::getUser()->isSuperUser())
                        <a href="#" data-toggle="modal" data-target="#roles-create">Add</a>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Attachments</div>
                <div class="panel-body">
                @if(Sentry::getUser()->isSuperUser())
                    <form action="{{ route('attachments.store')  }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="event_id" value="{{ $event->id  }}" />
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Attachment Name" />
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" multiple="true" name="file" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" />
                        </div>
                    </form>
                @endif
                <ul>
                @foreach($attachments as $a)
                    <li><a href="{{ $a->path  }}">{{ $a->name  }} ({{ formatSizeUnits(filesize(realpath(__DIR__)."/../../../public/". $a->local_path))  }})</a></li>
                @endforeach
                </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>
                <div class="panel-body">
                    <ul>
                    @foreach($comments as $c)
                        <li>({{ User::find($c->user_id)->first_name  }} {{ User::find($c->user_id)->last_name  }}) / {{ $c->created_at  }} - {{ $c->comment  }}</li>
                    @endforeach
                    </ul>

                    <form action="{{ route('comments.store') }}" method="POST">
                        <input type="hidden" name="event_id" value="{{ $event->id  }}" />
                        <div class="form-group">
                            <textarea name="comment" class="form-control" placeholder="Comment"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('modals.dates-create')
    @include('modals.roles-create')
@endsection