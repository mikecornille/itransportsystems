@extends('layouts.app')

@section('content')

@php
$id = "";

@endphp


<div class="container">
	<div class="row">
		<div class="col-md-6">
			<label class="label-control" for="find-customer-search-new">SEARCH</label>
			<input type="text" class="form-control" id="find-customer-search-new" placeholder="Carrier Search">
		</div>

	</div>

	<div class="row">
		<div class="col-md-6">
			<form role="form" class="form-horizontal" method="POST" action="/customerAccoutingEdit">
				{{ csrf_field() }}
				<label class="label-control" for="findcus_id">COMPANY ID #</label>
				<input type="text" class="form-control" id="findcus_id" name="findcus_id">
				<button style="margin-top: 15px;" type="submit" class="btn btn-primary" id="findHaulerSubmit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>

			</form>

		</div>
	</div>

</div>



@endsection