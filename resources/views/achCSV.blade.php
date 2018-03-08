@extends('layouts.app')

@section('content')
<div class="container">
	<h2>ACH File Generator</h2>
<form role="form" class="form-horizontal" method="POST" action="/achCSV/csv">

		{{ csrf_field() }}



		<div class="well" style="width: 300px;">
			<div class="form-group">
				<div class="row">
				<div class="col-xs-6">
			   		<label class="label-control" for="start_date">Start Date</label>
			   		<input type="text" class="form-control" id="datepicker_profit_start" name="start_date">
			 	</div>
			 	<div class="col-xs-6">
			   		<label class="label-control" for="end_date">End Date</label>
			   		<input type="text" class="form-control" id="datepicker_profit_end" name="end_date">
			 	</div>
					
				</div>

				<button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>

			</div>
		</div>
	
</form>
</div>

@endsection