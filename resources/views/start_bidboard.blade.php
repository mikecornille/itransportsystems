@extends('layouts.app')

@section('content')



<div class="container">

	

	<form role="form" class="form-horizontal" method="POST" action="/bidboard">

		{{ csrf_field() }}


		

			<div class="form-group">
				<div class="row">


					<div class="col-xs-3">
						<label class="label-control" for="pick_zip_loadlist_search">Pick Zip</label>
						<input type="text" class="form-control" id="pick_zip_loadlist_search">
					</div>
					<div class="col-xs-3">
						<label class="label-control" for="delivery_zip_loadlist_search">Delivery Zip</label>
						<input type="text" class="form-control" id="delivery_zip_loadlist_search">
					</div>

				</div>


				<div class="row">
					<div class="col-xs-4">
						<label class="label-control" for="pick_city">PICK CITY</label>
						<input type="text" class="form-control" id="pick_city" name="pick_city" value="{{ old('pick_city') }}">
					</div>
					<div class="col-xs-2">
						<label class="label-control" for="pick_state">STATE</label>
						<input type="text" class="form-control" id="pick_state" name="pick_state" value="{{ old('pick_state') }}">
					</div>
					<div class="col-xs-4">
						<label class="label-control" for="delivery_city">DELIVERY CITY</label>
						<input type="text" class="form-control" id="delivery_city" name="delivery_city" value="{{ old('delivery_city') }}">
					</div>
					<div class="col-xs-2">
						<label class="label-control" for="delivery_state">STATE</label>
						<div class="input-group">
							<input type="text" class="form-control" id="delivery_state" name="delivery_state" value="{{ old('delivery_state') }}">
							<span class="input-group-btn">
								<button class="btn btn-success" id="loadlist_map" type="button">MAP</button>
							</span>
						</div>           
					</div>

				</div>

				

				<div class="row">
					<div class="col-xs-3">
						<label class="label-control" for="miles">MILES</label>
						
							<input type="text" class="form-control" id="miles" name="miles" value="{{ old('miles') }}">
							
						
					</div>
					
				</div>
				<div class="row">
					<div style="margin-top: 10px;" class="col-xs-3">

						<button type="submit" id="new_quote_submit" class="btn btn-primary">GO</button>



					</div>
				</div>




			</div>

		

	</form>



	<div style="padding-bottom:20px;" id="loadlist_map_display"></div>


</div>






@endsection