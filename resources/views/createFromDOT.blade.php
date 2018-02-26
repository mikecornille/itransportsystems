@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-md-6">
			<form role="form" class="form-horizontal" method="POST" action="/insertDOT">
				{{ csrf_field() }}
				<label class="label-control" for="insertDOT">DOT #</label>
				<input type="text" class="form-control" id="insertDOT" name="insertDOT">
				
				<button style="margin-top: 15px;" type="submit" class="btn btn-primary" id="insertDOTSubmit">CREATE PROFILE</button>

			</form>

		</div>
	</div>

</div>

@endsection