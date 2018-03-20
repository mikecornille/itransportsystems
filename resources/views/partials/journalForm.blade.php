<div class="container">
	<h3>Journal Entry</h3>
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
		{{ Form::label('email', 'Email') }}
			{{ Form::text('email', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('contact', 'Contact') }}
			{{ Form::text('contact', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('phone', 'Phone') }}
			{{ Form::text('phone', null, ['class' => 'form-control']) }}
		</div>
	</div>


	<div class="row">
		<div class="col-md-5">
			{{ Form::label('address', 'Address') }}
			{{ Form::text('address', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('city', 'City') }}
			{{ Form::text('city', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-2">
			{{ Form::label('state', 'State') }}
			{{ Form::text('state', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-2">
			{{ Form::label('zip', 'Zip') }}
			{{ Form::text('zip', null, ['class' => 'form-control']) }}
		</div>
	</div>
	

	<hr>

<h3>ACH Info</h3>

	<div class="row">
		<div class="col-md-4">
			{{ Form::label('bank_name', 'Bank Name') }}
			{{ Form::text('bank_name', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('account_name', 'Account Name') }}
			{{ Form::text('account_name', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('account_type', 'Account Type') }}
	  		{{ Form::select('account_type', 
				[
	  		 		'checking' => 'checking',
			  		'savings' => 'savings',
				], null, ['placeholder' => 'Pick an account type...', 'class' => 'form-control']) }}
		</div>
	</div>

	<hr>
	
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('routing_number', 'Routing Number') }}
			{{ Form::text('routing_number', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('account_number', 'Account Number') }}
			{{ Form::text('account_number', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('accounting_email', 'Accounting Email') }}
			{{ Form::text('accounting_email', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('accounting_phone', 'Accounting Phone') }}
			{{ Form::text('accounting_phone', null, ['class' => 'form-control']) }}
		</div>
	</div>

</div>

{{ Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary', 'style' => 'margin-top: 15px;']) }}