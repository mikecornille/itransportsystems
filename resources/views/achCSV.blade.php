@extends('layouts.app')

@section('content')
<div class="container">
	<div class="well">
		<div class="row">
			<div class="col-md-5">
				<h2>SAMPLE ACH</h2>
					<form role="form" class="form-horizontal" method="POST" action="/sampleACHCSV/xlsx">

						{{ csrf_field() }}

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
					</form>
			</div>
			
			<div class="col-md-2">
			
			</div>

			<div class="col-md-5">
				<h2>ACH FILE W/EMAIL</h2>
					<form role="form" class="form-horizontal" method="POST" action="/achCSV/xlsx">

						{{ csrf_field() }}

							<div class="form-group">
								<div class="row">
									<div class="col-xs-6">
			   							<label class="label-control" for="start_date">Start Date</label>
			   							<input type="text" class="form-control" id="datepicker_ach_start" name="start_date">
			 						</div>
			 						<div class="col-xs-6">
			   							<label class="label-control" for="end_date">End Date</label>
			   							<input type="text" class="form-control" id="datepicker_ach_end" name="end_date">
			 						</div>
								</div>

							<button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>
							</div>
					</form>
			</div>
			
		</div> <!-- End row -->
	</div> <!-- End well -->
</div> <!-- End container -->

@endsection




<!-- sampleACHCSV -->