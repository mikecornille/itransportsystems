@extends('layouts.app')

@section('content')

<div class="container">

@if (session('status'))
    <div class="alert alert-success alert-dismissible">
        
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session('status') }}</strong> Click the X at the far right to close this notification.
    </div>
@endif

<input type="text" class="form-control" id="find-carrier-search" placeholder="Carrier Search">


<form role="form" class="form-horizontal" method="POST" action="/emailSetUp">

		{{ csrf_field() }}

				<div class="form-group">
				<div class="row">
					<div class="col-xs-3">
						<label class="label-control" for="tempEmail">Email</label>
						<input type="text" class="form-control" id="tempEmail" name="tempEmail" placeholder="carrier@carrier.com" required>
					</div>
					<div class="col-xs-3">
						<label class="label-control" for="tempLane">Lane</label>
						<input type="text" class="form-control" id="tempLane" name="tempLane" placeholder="lane" required>
					</div>
					<div class="col-xs-3">
						<label class="label-control" for="tempPhone">Phone</label>
						<input type="text" class="form-control" id="tempPhone" name="tempPhone" placeholder="123-456-7890" required>
					</div>
					<div class="col-xs-3">
						<label class="label-control" for="tempRate">Rate</label>
						<input type="text" class="form-control" id="tempRate" name="tempRate" required>
					</div>
				</div>

				<button style="margin-top: 10px;" type="submit" id="fast_carrier_setup_btn" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> NEW</button>
		</div>
	</form>
</div>



@endsection
@include('footer')