@extends('layouts.app')

@section('content')

<div class="container">

<form role="form" class="form-horizontal" method="POST" action="/findTrucks">

		{{ csrf_field() }}



		<div class="well">
		<h2 class="text-center">Find Carriers From Carrier Data</h2>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-6">
						<label class="label-control" for="state">State</label>
						<select name="state" id="state" class="form-control">
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
							<option value="AB">Alberta</option>
							<option value="BC">British Columbia</option>
							<option value="MB">Manitoba</option>
							<option value="NB">New Brunswick</option>
							<option value="NL">Newfoundland and Labrador</option>
							<option value="NS">Nova Scotia</option>
							<option value="ON">Ontario</option>
							<option value="PE">Prince Edward Island</option>
							<option value="QC">Quebec</option>
							<option value="SK">Saskatchewan</option>
						</select>
					</div>
				
					<div class="col-xs-6">
						<label class="label-control" for="trailer_type">Trailer Type</label>
						<select name="trailer_type" id="trailer_type" class="form-control">
						    <option value="Choose">Choose</option>
							<option value="flatbed">Flatbeds</option>
							<option value="stepdeck">Stepdecks</option>
							<option value="conestoga">Conestogas</option>
							<option value="hot_shot">Hot Shots</option>
							<option value="van">Vans</option>
							<option value="power">Power Only</option>
							<option value="lowboy">Lowboys</option>
							<option value="landoll">Landoll</option>
							<option value="towing">Towing</option>
							<option value="auto_carrier">Auto Carriers</option>
							<option value="straight_truck">Straight Trucks</option>
						</select>
					</div>
				</div>



				<button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> FIND</button>

			</div>
		</div>
	
</form>



@if($trailerResults != NULL)
	<h1>Company Results</h1>
		<ul style="list-style-type: none;">
			@foreach ($trailerResults as $result)
			    <li class="text-left"><u> COMPANY: {{ $result->company }}</u></li>
			    <li>NAME/PHONE/EMAIL: {{ $result->contact . ' ' . $result->phone . ' ' . $result->email }}</li>
			    <li>PERMANENT NOTES: {{ $result->permanent_notes }}</li>
			    <br>
	   		@endforeach
		</ul>
@endif

@if($trailerResults != NULL)
<h1>Email Results</h1>
<ul style="list-style-type: none;">
	@foreach ($trailerResults as $result)
	    {{ $result->email }};
	    
	   
	@endforeach
	</ul>
@endif




</div>



@endsection