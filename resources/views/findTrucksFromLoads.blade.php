@extends('layouts.app')

@section('content')

<div class="container">



<form role="form" class="form-horizontal" method="POST" action="/findTrucksFromLoads">

		{{ csrf_field() }}



		<div class="well">
		<h2 class="text-center">Find Carriers From Previous Loads</h2>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-4">
						<label class="label-control" for="loads_pick_state">Pick State</label>
						<select name="loads_pick_state" id="loads_pick_state" class="form-control">
							<option value="Choose">Choose</option>
							<option value="AL">Alabama</option>
							<option value="AK">Alaska</option>
							<option value="AZ">Arizona</option>
							<option value="AR">Arkansas</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DE">Delaware</option>
							<option value="DC">District Of Columbia</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="HI">Hawaii</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="IA">Iowa</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="ME">Maine</option>
							<option value="MD">Maryland</option>
							<option value="MA">Massachusetts</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MS">Mississippi</option>
							<option value="MO">Missouri</option>
							<option value="MT">Montana</option>
							<option value="NE">Nebraska</option>
							<option value="NV">Nevada</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NY">New York</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="OH">Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VT">Vermont</option>
							<option value="VA">Virginia</option>
							<option value="WA">Washington</option>
							<option value="WV">West Virginia</option>
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select>
					</div>

					<div class="col-xs-4">
						<label class="label-control" for="loads_delivery_state">Delivery State</label>
						<select name="loads_delivery_state" id="loads_delivery_state" class="form-control">
						    <option value="Choose">Choose</option>
							<option value="AL">Alabama</option>
							<option value="AK">Alaska</option>
							<option value="AZ">Arizona</option>
							<option value="AR">Arkansas</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DE">Delaware</option>
							<option value="DC">District Of Columbia</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="HI">Hawaii</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="IA">Iowa</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="ME">Maine</option>
							<option value="MD">Maryland</option>
							<option value="MA">Massachusetts</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MS">Mississippi</option>
							<option value="MO">Missouri</option>
							<option value="MT">Montana</option>
							<option value="NE">Nebraska</option>
							<option value="NV">Nevada</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NY">New York</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="OH">Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VT">Vermont</option>
							<option value="VA">Virginia</option>
							<option value="WA">Washington</option>
							<option value="WV">West Virginia</option>
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select>
					</div>
				
					<div class="col-xs-4">
						<label class="label-control" for="loads_trailer_type">Trailer Type</label>
						<select name="loads_trailer_type" id="loads_trailer_type" class="form-control">
							<option value="Choose">Choose</option>
							<option value="Flatbed">Flatbed</option>
						    <option value="Stepdeck">Stepdeck</option>
						    <option value="Conestoga">Conestoga</option>
						    <option value="Hot Shot">Hot Shot</option>
						    <option value="Van">Van</option>
						    <option value="Power">Power</option>
						    <option value="Lowboy">Lowboy</option>
						    <option value="Landoll">Landoll</option>
						    <option value="Towing">Towing</option>
						    <option value="Auto Carrier">Auto Carrier</option>
						    <option value="Straight Truck">Straight Truck</option>
						</select>
					</div>
				</div>



				<button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> FIND</button>

			</div>
		</div>
	
</form>



@if($trailerResultsFromLoads != NULL)
<h1>Company Results From Previous Loads</h1>
<ul style="list-style-type: none;">
	@foreach ($trailerResultsFromLoads as $loads)
	    		<li class="text-left"><u>COMPANY: {{ $loads->carrier_name . ' MC # ' . $loads->carrier_mc }}</u></li>
	    		<li class="text-left">PRO #: {{ $loads->id }} on {{ $loads->rate_con_creation_date }} for ${{ $loads->carrier_rate }}.00</li>
			    <li class="text-left">NAME/PHONE/EMAIL: {{ $loads->carrier_contact . ' ' . $loads->carrier_phone . ' ' . $loads->carrier_email }}</li>
			    <li class="text-left">PREVIOUS LANE: {{ $loads->pick_city . ', ' . $loads->pick_state . ' to ' . $loads->delivery_city . ', ' . $loads->delivery_state }}</li>
			    <li class="text-left">COMMODITY: {{ $loads->commodity }}</li>
			    <br>
	   
	@endforeach
	</ul>
@endif


@if($trailerResultsFromLoads != NULL)
<h1>Email Results</h1>
<ul style="list-style-type: none;">
	@foreach ($trailerResultsFromLoads as $loads)
	    {{ $loads->carrier_email }};
	    
	   
	@endforeach
	</ul>
@endif
</div>



@endsection