    <!-- Modal -->
    <div class="modal fade" id="roles-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Event</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('roles.store')  }}" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="event_id" value="{{ $event->id  }}" />
                            <select name="user_id" class="form-control">
                                @foreach(User::all() as $u)
                                    <option value="{{ $u->id  }}">{{ $u->email  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="role" class="form-control">
                                @foreach(["HoT","TIC","aTIC","exec","FoH","aFoH","Mon","aMon","LD","aLD","Lprog","ME","aME","MR","aMR","SM","aSM","bdSM","SpotOp","Runner","Hole","aHole","car","truck","setup","strike","food"] as $r)
                                    <option value="{{ $r  }}">{{ $r  }}</option>
                                @endforeach
                            </select>
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