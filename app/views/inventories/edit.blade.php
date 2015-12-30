@extends('layout')

@section('content')
    <h3>Inventory</h3>

    <div class="panel panel-default">
        <div class="panel-heading">Edit</div>
        <div class="panel-body">
            {{ Form::open(array('route' => ['inventories.update', $inventory->id], 'method' => 'put')) }}
            <div class="form-group">
                <input type="text" name="name" value="{{ $inventory->name  }}" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="text" name="brand" value="{{ $inventory->brand  }}" class="form-control" placeholder="Brand">
            </div>
            <div class="form-group">
                <input type="text" name="quantity" value="{{ $inventory->quantity  }}" class="form-control" placeholder="Quantity">
            </div>
            <div class="form-group">
                <input type="text" name="location" value="{{ $inventory->location  }}" class="form-control" placeholder="Storage Location">
            </div>
            <div class="form-group">
                <input type="text" name="current_location" value="{{ $inventory->current_location  }}" class="form-control" placeholder="Current Location">
            </div>
            <div class="form-group">
                <input type="text" name="purchase_date" value="{{ $inventory->purchase_date  }}" class="form-control datepicker" placeholder="Purchase Date">
            </div>
            <div class="form-group">
                <input type="text" name="purchase_from" value="{{ $inventory->purchase_from  }}" class="form-control" placeholder="Purchase From">
            </div>
            <div class="form-group">
                <input type="text" name="warranty_expiration" value="{{ $inventory->warranty_expiration  }}" class="form-control datepicker" placeholder="Warranty Expiration">
            </div>
            <div class="form-group">
                <input type="text" name="rental_price" value="{{ $inventory->rental_price  }}" class="form-control" placeholder="Rental Price">
            </div>
            <div class="form-group">
                <textarea name="serial_numbers" class="form-control" placeholder="Serial Numbers(one per line)">{{ $inventory->serial_numbers  }}</textarea>
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
            {{ Form::close() }}
        </div>
    </div>
@endsection