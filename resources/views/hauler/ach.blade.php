@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['url' => route('hauler.ach.process', ['token' => $carrier->ach_token])]) !!}
    {{ Form::label('bank_name', 'Bank Name') }}
    {{ Form::text('bank_name') }}

        {{ Form::label('routing_number', 'Routing Number') }}
    {{ Form::text('routing_number') }}

            {{ Form::label('account_number', 'Account Number') }}
    {{ Form::text('account_number') }}

    	  		{{ Form::label('account_type', 'Account Type') }}
	  		{{ Form::select('account_type', 
				[
	  		 		'checking' => 'checking',
			  		'savings' => 'savings',
				], null, ['placeholder' => 'Pick an account type...', 'class' => 'form-control']) }}

				{{ Form::submit('Submit', ['class' => 'form-control btn btn-primary', 'style' => 'margin-top: 15px;']) }}

{!! Form::close() !!}