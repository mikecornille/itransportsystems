@extends('layouts.app')

@section('content')

<form role="form" class="form-horizontal" method="POST" action="/submitNewJournalVendor">

		{{ csrf_field() }}

		<div class="well" style="width: 600px; margin: 0 auto;">
			<div class="form-group">
				<div class="row">
					<div class="col-xs-6">
				   		<label class="label-control" for="vendor_name">New Vendor Name</label>
				   		<input type="text" class="form-control" id="vendor_name" name="vendor_name" required>
				 	</div>
				</div>
						<button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>
			</div>
		</div>
	</form>

@endsection