{{ Form::label('description', 'Description') }}
{{ Form::text('description', null, ['class' => 'form-control']) }}

{{ Form::label('monthly_amount', 'Monthly Amount') }}
{{ Form::text('monthly_amount', null, ['class' => 'form-control']) }}


{{ Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary', 'style' => 'margin-top: 15px;']) }}