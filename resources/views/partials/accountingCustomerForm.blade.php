<h2>Customer Info</h2>

<div class="row">
	  	<div class="col-md-8">
	  		{{ Form::label('name', 'Company') }}
	  		{{ Form::text('name', null, ['class' => 'form-control']) }}
		</div>

		<div class="col-md-4">
			{{ Form::label('contact', 'Contact') }}
		    {{ Form::text('contact', null, ['class' => 'form-control']) }}
	  		
		</div>
		
	 	
		

		
</div>

<div class="row">
	  	<div class="col-md-4">
			{{ Form::label('phone', 'Phone') }}
			{{ Form::text('phone', null, ['class' => 'form-control']) }}
	 	</div>

		<div class="col-md-4">
			{{ Form::label('email', 'Email') }}
		    {{ Form::text('email', null, ['class' => 'form-control']) }}
	  		
		</div>
		<div class="col-md-4">
			{{ Form::label('fax', 'Fax') }}
			{{ Form::text('fax', null, ['class' => 'form-control']) }}
	 	</div>
	 	
		

		
</div>

<div class="row">
	  	<div class="col-md-8">
	  		{{ Form::label('address', 'Address') }}
	  		{{ Form::text('address', null, ['class' => 'form-control']) }}
		</div>
		<div class="col-md-4">
			{{ Form::label('location_number', 'Location Number') }}
			{{ Form::text('location_number', null, ['class' => 'form-control']) }}
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
	  	<div class="col-md-3">
	  		{{ Form::label('accounting_name', 'Accounting Name') }}
	  		{{ Form::text('accounting_name', null, ['class' => 'form-control']) }}
		</div>

		<div class="col-md-3">
			{{ Form::label('accounting_phone', 'Accounting Phone') }}
		    {{ Form::text('accounting_phone', null, ['class' => 'form-control']) }}
	  		
		</div>
		<div class="col-md-3">
			{{ Form::label('accounting_email', 'Accounting Email') }}
			{{ Form::text('accounting_email', null, ['class' => 'form-control']) }}
	 	</div>
	 	
		

		
</div>

<div class="row">
	  	<div class="col-md-12">
	  		{{ Form::label('internal_notes', 'Permanent Notes') }}
	  		{{ Form::textarea('internal_notes', null, ['class' => 'form-control']) }}
		</div>
	</div>

	


	{{ Form::submit($submitButtonText, ['class' => 'form-control btn btn-primary', 'style' => 'margin-top: 15px;']) }}


<table class="table table-hover">
    <thead>
      <tr>
        <th>Pro</th>
        <th>Pick</th>
        <th>Delivery</th>
        <th>Billed Date</th>
        <!-- <th>Due Date</th>
        <th>Aging</th>
        <th>Amount Due</th>
        <th>Amount Paid</th>
        <th>Payment Method</th>
        <th>Reference #</th>
        <th>Deposit Date</th> -->
      </tr>
    </thead>
    <tbody>
      @foreach($getCustomerLoads as $load)
      	<?php
			

		?>
		
      <tr class="loadlist_row alt-colors">
      	<td>{{ $load->id }}</td>
        <td>{{ $load->pick_city . ', ' . $load->pick_state }}</td>
        <td>{{ $load->delivery_city . ', ' . $load->delivery_state }}</td>
        <td>{{ $load->billed_date }}</td>
        


      </tr>
      
      @endforeach
    </tbody>
  </table>
	

