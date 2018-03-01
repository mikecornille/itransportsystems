	

	<!-- <div class="row">
	  	<div class="col-md-3">
	  		{{ Form::label('active', 'Do Not Load', ['class' => 'text-danger', 'style' => 'font-size:20px;']) }}
	  		{{ Form::radio('active', 'noload', null, ['style' => 'margin-left:15px;']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('active', 'Active', ['class' => 'text-success', 'style' => 'font-size:20px;']) }}
	  		{{ Form::radio('active', 'active', null, ['style' => 'margin-left:15px;']) }}
		</div>
	</div> -->

	<div class="row">
	  	<div class="col-md-6">
	  		{{ Form::label('company', 'Company') }}
	  		{{ Form::text('company', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('mc_number', 'MC #') }}
			<!-- <div class="input-group"> -->
	  		{{ Form::text('mc_number', null, ['class' => 'form-control']) }}
	  		<!-- <span class="input-group-btn">
	  		<button class="btn btn-primary" id="new_carrier_fmcsa" type="button">DOT LINK</button>
	  		</span>
	  		</div> -->
		</div>
		

		<div class="col-md-3">
			{{ Form::label('dot_number', 'DOT #') }}
			<!-- <div class="input-group"> -->
			{{ Form::text('dot_number', null, ['class' => 'form-control']) }}
	  		<!-- <span class="input-group-btn">
	  		<button class="btn btn-primary" id="dot_number_find" type="button">FIND</button>
	  		</span>
	  		
	  		</div> -->
		</div>


	</div>

	<div class="row">
	  	
	  	<div class="col-md-9">
	  		{{ Form::label('address', 'Address') }}
	  		<!-- <div class="input-group"> -->
	  		{{ Form::text('address', null, ['class' => 'form-control']) }}
	  		<!-- <span class="input-group-btn">
	  		<button class="btn btn-primary" id="push_to_remit" type="button">PUSH TO REMIT</button>
	  		</span>
	  		</div> -->
		</div>



		<div class="col-md-3">
			{{ Form::label('contact', 'Contact') }}
	  		{{ Form::text('contact', null, ['class' => 'form-control']) }}
		</div>
	</div>

	<div class="row">
	  	<div class="col-md-6">
	  		{{ Form::label('city', 'City') }}
	  		{{ Form::text('city', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('state', 'State') }}
	  		{{ Form::text('state', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('zip', 'Zip') }}
	  		{{ Form::text('zip', null, ['class' => 'form-control']) }}
		</div>
	</div>

	<div class="row">
	  	<div class="col-md-4">
	  		{{ Form::label('phone', 'Phone') }}
	  		{{ Form::text('phone', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('fax', 'Fax') }}
	  		{{ Form::text('fax', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('email', 'Email') }}
	  		{{ Form::text('email', null, ['class' => 'form-control']) }}
		</div>
	</div>

	<div class="row">
	  	<div class="col-md-6">
	  		{{ Form::label('driver_name', 'Driver Name') }}
	  		{{ Form::text('driver_name', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-6">
			{{ Form::label('driver_phone', 'Driver Phone') }}
	  		{{ Form::text('driver_phone', null, ['class' => 'form-control']) }}
		</div>
	</div>
	

	<div class="row">
	  	<div class="col-md-6">
	  		{{ Form::label('insurance_company_email', 'Insurance Company Email') }}
	  		{{ Form::text('insurance_company_email', null, ['class' => 'form-control']) }}
		</div>
	</div>

	<div class="row">
	  	<div class="col-md-4">
	  		{{ Form::label('cargo_exp', 'Cargo Exp.') }}
	  		{{ Form::text('cargo_exp', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('cargo_amount', 'Cargo Amount') }}
	  		{{ Form::text('cargo_amount', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('bc_contract', 'BC Contract') }}
	  		{{ Form::text('bc_contract', null, ['class' => 'form-control']) }}
		</div>
	</div>
	<hr>
	<div class="row">
	  	<div class="col-md-4">
	  		{{ Form::select('trailer_type_1', 
				[
	  		 		'flatbed' => 'flatbed',
			  		'stepdeck' => 'stepdeck',
			  		'conestoga' => 'conestoga',
			  		'hot_shot' => 'hot_shot',
			  		'van' => 'van',
			  		'power' => 'power',
			  		'lowboy' => 'lowboy',
			  		'landoll' => 'landoll',
			  		'towing' => 'towing',
			  		'auto_carrier' => 'auto_carrier',
			  		'straight_truck' => 'straight_truck'
				], null, ['placeholder' => 'Pick a trailer type...', 'class' => 'form-control']) }}
	  	</div>

	  	<div class="col-md-4">
	  		{{ Form::select('trailer_type_2', 
				[
	  		 		'flatbed' => 'flatbed',
			  		'stepdeck' => 'stepdeck',
			  		'conestoga' => 'conestoga',
			  		'hot_shot' => 'hot_shot',
			  		'van' => 'van',
			  		'power' => 'power',
			  		'lowboy' => 'lowboy',
			  		'landoll' => 'landoll',
			  		'towing' => 'towing',
			  		'auto_carrier' => 'auto_carrier',
			  		'straight_truck' => 'straight_truck'
				], null, ['placeholder' => 'Pick a trailer type...', 'class' => 'form-control']) }}
	  	</div>

	  	<div class="col-md-4">
	  		{{ Form::select('trailer_type_3', 
				[
	  		 		'flatbed' => 'flatbed',
			  		'stepdeck' => 'stepdeck',
			  		'conestoga' => 'conestoga',
			  		'hot_shot' => 'hot_shot',
			  		'van' => 'van',
			  		'power' => 'power',
			  		'lowboy' => 'lowboy',
			  		'landoll' => 'landoll',
			  		'towing' => 'towing',
			  		'auto_carrier' => 'auto_carrier',
			  		'straight_truck' => 'straight_truck'
				], null, ['placeholder' => 'Pick a trailer type...', 'class' => 'form-control']) }}
	  	</div>
	</div>
	<hr>

	<div class="row">
	  	<div class="col-md-4">
	  		{{ Form::label('remit_name', 'Remit Name') }}
	  		{{ Form::text('remit_name', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('remit_address', 'Remit Address') }}
	  		{{ Form::text('remit_address', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('remit-search', 'Remit Search') }}
	  		{{ Form::text('remit-search', null, ['class' => 'form-control', 'placeholder' => 'Remit Search']) }}
		</div>
	</div>
	<div class="row">
	  	<div class="col-md-4">
	  		{{ Form::label('remit_city', 'Remit City') }}
	  		{{ Form::text('remit_city', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('remit_state', 'Remit State') }}
	  		{{ Form::text('remit_state', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('remit_zip', 'Remit Zip') }}
	  		{{ Form::text('remit_zip', null, ['class' => 'form-control']) }}
		</div>
	</div>
	<!-- <div class="row">
	  	<div class="col-md-3">
	  		{{ Form::label('oos_driver_national', 'OOS DRIVER NATIONAL') }}
	  		{{ Form::text('oos_driver_national', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
	  		{{ Form::label('oos_driver_company', 'OOS DRIVER COMPANY') }}
	  		{{ Form::text('oos_driver_company', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('oos_vehicle_national', 'OOS VEHICLE NATIONAL') }}
	  		{{ Form::text('oos_vehicle_national', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('oos_vehicle_company', 'OOS VEHICLE COMPANY') }}
	  		{{ Form::text('oos_vehicle_company', null, ['class' => 'form-control']) }}
		</div>
	</div>
	<div class="row">
	  	<div class="col-md-3">
	  		{{ Form::label('crashes', 'NUMBER OF CRASHES') }}
	  		{{ Form::text('crashes', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
	  		{{ Form::label('fatal_crashes', 'FATAL CRASHES', ['class' => 'text-danger']) }}
	  		{{ Form::text('fatal_crashes', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
	  		{{ Form::label('allowed_to_operate', 'ALLOWED TO OPERATE', ['class' => 'text-danger']) }}
	  		{{ Form::text('allowed_to_operate', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
	  		{{ Form::label('operation_type', 'OPERATION TYPE') }}
	  		{{ Form::text('operation_type', null, ['class' => 'form-control']) }}
		</div>
	</div> -->

	<!-- <div class="row">
	  	<div class="col-md-3">
	  		{{ Form::label('number_of_drivers', 'NUMBER OF DRIVERS') }}
	  		{{ Form::text('number_of_drivers', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
	  		{{ Form::label('number_of_power', 'NUMBER OF POWER UNITS') }}
	  		{{ Form::text('number_of_power', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-6">
	  		{{ Form::label('google_carrier', 'GOOGLE RESULTS (ENTER DATE OF ENTRY)') }}
	  		{{ Form::text('google_carrier', null, ['class' => 'form-control']) }}
		</div>
	</div> -->

	<div class="row">
	  	<div class="col-md-12">
	  		{{ Form::label('permanent_notes', 'Permanent Notes') }}
	  		{{ Form::textarea('permanent_notes', null, ['class' => 'form-control']) }}
		</div>
	</div>

	<div class="row">
	  	<div class="col-md-4">
	  		{{ Form::label('load_route', 'Current Load Route') }}
	  		{{ Form::text('load_route', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('current_carrier_rate', 'Current Carrier Rate') }}
	  		{{ Form::text('current_carrier_rate', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('current_trailer_type', 'Current Trailer Type') }}
	  		{{ Form::text('current_trailer_type', null, ['class' => 'form-control']) }}
		</div>
	</div>
	<div class="row">
	  	<div class="col-md-4">
	  		{{ Form::label('current_city_location', 'Current City (EMPTY OR LOADED?)') }}
	  		{{ Form::text('current_city_location', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
	  		{{ Form::label('delivery_schedule', 'Delivery Schedule') }}
	  		{{ Form::text('delivery_schedule', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('current_miles_from_pick', 'Miles From Pick') }}
	  		{{ Form::text('current_miles_from_pick', null, ['class' => 'form-control']) }}
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-8">
	  		{{ Form::label('load_info', 'Additional Load Info') }}
	  		{{ Form::text('load_info', null, ['class' => 'form-control']) }}
		</div>

		@if($employees != 'none')
		<div class="col-md-4">
			{{ Form::label('email_colleague_carrier', 'Email Colleague') }}
			{{ Form::select('email_colleague_carrier', $employees
			, null, ['placeholder' => 'Choose employee...', 'class' => 'form-control']) }}
        </div>
        @endif
	</div>
	

	<!-- number of trucks in fleet
	
	oos_vehicle
	oos_driver

	oos_vehicle_national
	oos_driver_national

	fatal_accidents

	active_status_date -->

	{{ Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary', 'style' => 'margin-top: 15px;']) }}



	

