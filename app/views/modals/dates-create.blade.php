    <!-- Modal -->
    <div class="modal fade" id="dates-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Date</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dates.store')  }}" method="POST">
                        <input type="hidden" name="event_id" value="{{ $event->id  }}" />
                        <div class="form-group">
                            <input type="text" name="description" class="form-control" placeholder="Description" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="calldate" class="form-control datetimepicker" placeholder="Call Date" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="startdate" class="form-control datetimepicker" placeholder="Start Date" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="enddate" class="form-control datetimepicker" placeholder="End Date" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="strikedate" class="form-control datetimepicker" placeholder="Strike Date" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Location" />
                        </div>
                        <div class="form-group">
                            <textarea name="notes" class="form-control" placeholder="Notes"></textarea>
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