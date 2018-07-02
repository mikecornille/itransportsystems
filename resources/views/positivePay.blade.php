@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<form role="form" class="form-horizontal" method="POST" action="/exportPositivePay/csv">

				{{ csrf_field() }}

				<div class="well">
					<div class="form-group">
				
			   			<label class="label-control" for="positivePay">Positive Pay Carriers By Date</label>
			   			<input type="text" class="form-control" id="datepickerPositivePay" name="positivePay">
			 		</div>
			 	</div>

				<button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>

			
		
</form>

</div>
<div class="col-md-6">
<form role="form" class="form-horizontal" method="POST" action="/exportPositivePayJournal/csv">

		{{ csrf_field() }}



		<div class="well">
			<div class="form-group">
				
			   		<label class="label-control" for="positivePayJournal">Positive Pay Journal By Date</label>
			   		<input type="text" class="form-control" id="datepickerPositivePayJournal" name="positivePayJournal">
			 	</div>
			 	
					
				</div>

				<button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>

			
		
</form>

</div>
</div>
</div>


@endsection