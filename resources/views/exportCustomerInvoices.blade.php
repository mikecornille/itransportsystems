@extends('layouts.app')

@section('content')

<div class="container">
<form role="form" class="form-horizontal" method="POST" action="/exportCustomerInvoices/csv">

		{{ csrf_field() }}



		<div class="well" style="width: 300px;">
			<div class="form-group">
				<div class="row">
				<div class="col-xs-6">
			   		<label class="label-control" for="import_date">Import Date</label>
			   		<input type="text" class="form-control" id="datepicker_quickbooks" name="import_date">
			 	</div>
			 	
					
				</div>

				<button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>

			</div>
		</div>
	</div>
</form>
</div>


@endsection