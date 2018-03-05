<h2>Company Info</h2>

<div class="row">
	  	<div class="col-md-6">
	  		{{ Form::label('company', 'Company') }}
	  		{{ Form::text('company', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('mc_number', 'MC #') }}
			{{ Form::text('mc_number', null, ['class' => 'form-control']) }}
	 	</div>
		

		<div class="col-md-3">
			{{ Form::label('dot_number', 'DOT #') }}
		    {{ Form::text('dot_number', null, ['class' => 'form-control']) }}
	  		
		</div>


	</div>

	<div class="row">
	  	
	  	<div class="col-md-9">
	  		{{ Form::label('address', 'Address') }}
	  		{{ Form::text('address', null, ['class' => 'form-control']) }}
	
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
	
	
	<hr>

	<h2>Check Payment Info</h2>

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

	<hr>

	<h2>ACH Payment Info</h2>

	<div class="row">
	  	<div class="col-md-4">
	  		{{ Form::label('bank_name', 'Bank Name') }}
	  		{{ Form::text('bank_name', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('routing_number', 'Routing Number') }}
	  		{{ Form::text('routing_number', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('account_number', 'Account Number') }}
	  		{{ Form::text('account_number', null, ['class' => 'form-control']) }}
		</div>
	</div>

	<div class="row">
	  	<div class="col-md-4">
	  		{{ Form::label('account_type', 'Account Type') }}
	  		{{ Form::select('account_type', 
				[
	  		 		'checking' => 'checking',
			  		'savings' => 'savings',
				], null, ['placeholder' => 'Pick an account type...', 'class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('accounting_email', 'Accounting Email') }}
	  		{{ Form::text('accounting_email', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('accounting_phone', 'Accounting Phone') }}
	  		{{ Form::text('accounting_phone', null, ['class' => 'form-control']) }}
		</div>
	</div>

	

	<div class="row">
	  	<div class="col-md-12">
	  		{{ Form::label('permanent_notes', 'Permanent Notes') }}
	  		{{ Form::textarea('permanent_notes', null, ['class' => 'form-control']) }}
		</div>
	</div>


	{{ Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary', 'style' => 'margin-top: 15px;']) }}



	

