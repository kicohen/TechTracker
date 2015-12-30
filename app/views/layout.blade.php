<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ASB </title>
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="http://getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">
    <link href="{{ asset('jquery.datetimepicker.css')  }}" type=text/css rel="stylesheet">
    <style type="text/css">
        *{
            border-radius:0px !important;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ASB System</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if(Config::get('system.attendance') == true)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Attendance <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('attendances.index')  }}">List</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#attandances-create">Create</a></li>
                    </ul>
                </li>
                @endif
                @if(Sentry::getUser()->isSuperUser()))
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Organizations <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('groups.index')  }}">List</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#groups-create">Create</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('users.index')  }}">List</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#users-create">Create</a></li>
                    </ul>
                </li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventory <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('inventories.index')  }}">List</a></li>
                        @if(Sentry::getUser()->isSuperUser())
                        <li><a href="#" data-toggle="modal" data-target="#inventories-create">Create</a></li>
                        @endif
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('events.index')  }}">List</a></li>
                        @if(Sentry::getUser()->isSuperUser())
                        <li><a href="#" data-toggle="modal" data-target="#events-create">Create</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li><a href="{{ route('sessions.destroy')  }}">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    @if ($errors->has())
        <div class="alert alert-danger" style="margin-top:15px;">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif


    @yield('content')

</div><!-- /.container -->
@if(Config::get('system.attendance') == true)
@include('modals.attendances-create')
@endif
@if(Sentry::getUser()->isSuperUser())
    @include('modals.groups-create')
    @include('modals.users-create')
    @include('modals.inventories-create')
    @include('modals.events-create')
@endif

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('jquery.datetimepicker.full.min.js') }}"></script>
<script type="text/javascript">
    function deleteUser(id) {
        if (confirm('Delete this excuse?')) {
            $.ajax({
                type: "DELETE",
                url: 'attendances/' + id, //resource
                success: function() {
                    return location.reload();
                }
            });
        }
    }
    @if(Sentry::getUser()->isSuperUser())
    function deleteOrganization(id) {
        if (confirm('Delete this organization?')) {
            $.ajax({
                type: "DELETE",
                url: 'groups/' + id, //resource
                success: function() {
                    return location.reload();
                }
            });
        }
    }
    function deleteUser(id) {
        if (confirm('Delete this user?')) {
            $.ajax({
                type: "DELETE",
                url: 'users/' + id, //resource
                success: function() {
                    return location.reload();
                }
            });
        }
    }
    function deleteInventory(id) {
        if (confirm('Delete this item?')) {
            $.ajax({
                type: "DELETE",
                url: 'inventories/' + id, //resource
                success: function() {
                    return location.reload();
                }
            });
        }
    }
    @endif
    $(function() {
        $( ".datepicker" ).datepicker();
        $('.datetimepicker').datetimepicker();
    });
</script>
</body>
</html>
