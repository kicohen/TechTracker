    <!-- Modal -->
    <div class="modal fade" id="attandances-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Attendance</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('attendances.store')  }}" method="POST">
                        <div class="form-group">
                            <input type="text" name="date" class="form-control datepicker" placeholder="Date of Absence">
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