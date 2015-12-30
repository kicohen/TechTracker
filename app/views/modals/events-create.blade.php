    <!-- Modal -->
    <div class="modal fade" id="events-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Event</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('events.store')  }}" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <select name="organization_id" class="form-control">
                                @foreach($h4ss2_groups as $g)
                                    <option value="{{ $g->id  }}">{{ $g->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="Initial Request">Initial Request</option>
                                <option value="Event Confirmed">Event Confirmed</option>
                                <option value="Event Completed">Event Completed</option>
                                <option value="Event Declined">Event Declined</option>
                                <option value="Event Cancelled">Event Cancelled</option>
                                <option value="Billing Pending">Billing Pending</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="email" name="contact_email" class="form-control" placeholder="Contact Email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="contact_name" class="form-control" placeholder="Contact Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="contact_phone" class="form-control" placeholder="Contact Phone">
                        </div>
                        <div class="form-group">
                            <select name="publish" class="form-control">
                                <option value="0">Not Published</option>
                                <option value="1">Published</option>
                            </select>
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