@extends('layouts.app')

@section('content')



<div class="container">
	<div class="row">
		<div class="col-md-6">
			<label class="label-control" for="find-carrier-search-new">SEARCH</label>
			<input type="text" class="form-control" id="find-carrier-search-new" placeholder="Carrier Search">
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<form role="form" class="form-horizontal" method="POST" action="/haulerEdit">
				{{ csrf_field() }}
				<label class="label-control" for="findcar_id">COMPANY ID #</label>
				<input type="text" class="form-control" id="findcar_id" name="findcar_id" value="{{ $id }}">
				
				<button style="margin-top: 15px;" type="submit" class="btn btn-primary" id="findHaulerSubmit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>

			</form>

		</div>
	</div>

</div>

@endsection
@include('footer')