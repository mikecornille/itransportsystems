@extends('layouts.app')

@section('content')

	<div class="container">
		<input type="text" class="form-control" id="find-carrier-search-new" placeholder="Carrier Search">		

		<form role="form" class="form-horizontal" method="POST" action="/haulerEdit">
		
		{{ csrf_field() }}

		<div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					<label class="label-control" for="findcar_id">COMPANY</label>
					<input type="text" class="form-control" id="findcar_id" name="findcar_id">
				</div>
			</div>
		</div>

		<button type="submit" class="btn btn-primary" id="findHaulerSubmit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>

	</form>

	</div>

@endsection
@include('footer')