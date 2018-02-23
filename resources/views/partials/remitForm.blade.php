{{ Form::label('name', 'Name') }}
{{ Form::text('name', null, ['class' => 'form-control']) }}

{{ Form::label('address', 'Address') }}
{{ Form::text('address', null, ['class' => 'form-control']) }}

{{ Form::label('city', 'City') }}
{{ Form::text('city', null, ['class' => 'form-control']) }}

{{ Form::label('state', 'State') }}
{{ Form::text('state', null, ['class' => 'form-control']) }}

{{ Form::label('zip', 'Zip') }}
{{ Form::text('zip', null, ['class' => 'form-control']) }}

{{ Form::label('contact', 'Contact') }}
{{ Form::text('contact', null, ['class' => 'form-control']) }}

{{ Form::label('phone', 'Phone') }}
{{ Form::text('phone', null, ['class' => 'form-control']) }}

{{ Form::label('email', 'Email') }}
{{ Form::text('email', null, ['class' => 'form-control']) }}

{{ Form::label('routing_number', 'Routing') }}
{{ Form::text('routing_number', null, ['class' => 'form-control']) }}

{{ Form::label('checking_number', 'Checking') }}
{{ Form::text('checking_number', null, ['class' => 'form-control']) }}


{{ Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary', 'style' => 'margin-top: 15px;']) }}