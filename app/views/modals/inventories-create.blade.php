    <!-- Modal -->
    <div class="modal fade" id="inventories-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Inventory</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('inventories.store')  }}" method="POST">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="brand" class="form-control" placeholder="Brand">
                        </div>
                        <div class="form-group">
                            <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                        </div>
                        <div class="form-group">
                            <input type="text" name="location" class="form-control" placeholder="Storage Location">
                        </div>
                        <div class="form-group">
                            <input type="text" name="current_location" class="form-control" placeholder="Current Location">
                        </div>
                        <div class="form-group">
                            <input type="text" name="purchase_date" class="form-control datepicker" placeholder="Purchase Date">
                        </div>
                        <div class="form-group">
                            <input type="text" name="purchase_from" class="form-control" placeholder="Purchase From">
                        </div>
                        <div class="form-group">
                            <input type="text" name="warranty_expiration" class="form-control datepicker" placeholder="Warranty Expiration">
                        </div>
                        <div class="form-group">
                            <input type="text" name="rental_price" class="form-control" placeholder="Rental Price">
                        </div>
                        <div class="form-group">
                            <textarea name="serial_numbers" class="form-control" placeholder="Serial Numbers(one per line)"></textarea>
                        </div>
                        <div class="form-group">
                            <select name="organization_id" class="form-control">
                                @foreach($h4ss2_groups as $g)
                                    <option value="{{ $g->id  }}">{{ $g->name  }}</option>
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