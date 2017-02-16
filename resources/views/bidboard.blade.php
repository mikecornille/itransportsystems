@extends('layouts.app')

@section('content')



<div class="container">

	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif


	

	<form role="form" class="form-horizontal" method="POST" action="/quote_loadlist">

		{{ csrf_field() }}


		<input type="hidden" name="created_by">
		<input type="hidden" name="urgency">
		<input type="hidden" name="trailer_type">
		<input type="hidden" name="pick_date">
		<input type="hidden" name="pick_time">
		<input type="hidden" name="delivery_date">
		<input type="hidden" name="delivry_time">
		<input type="hidden" name="special_instructions">
		<input type="hidden" name="length">
		<input type="hidden" name="width">
		<input type="hidden" name="height">
		<input type="hidden" name="weight">
		<input type="hidden" name="offer_money">
		<input type="hidden" name="post_money">
		<input type="hidden" name="company_contact">
		<input type="hidden" name="contact_phone">

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
						<input type="text" class="form-control" id="pick_city" name="pick_city" value="{{ $pick_city }}">
					</div>
					<div class="col-xs-2">
						<label class="label-control" for="pick_state">STATE</label>
						<input type="text" class="form-control" id="pick_state" name="pick_state" value="{{ $pick_state }}">
					</div>
					<div class="col-xs-4">
						<label class="label-control" for="delivery_city">DELIVERY CITY</label>
						<input type="text" class="form-control" id="delivery_city" name="delivery_city" value="{{ $delivery_city }}">
					</div>
					<div class="col-xs-2">
						<label class="label-control" for="delivery_state">STATE</label>
						<div class="input-group">
							<input type="text" class="form-control" id="delivery_state" name="delivery_state" value="{{ $delivery_state }}">
							<span class="input-group-btn">
								<button class="btn btn-success" id="loadlist_map" type="button">MAP</button>
							</span>
						</div>           
					</div>

				</div>

				<div class="row">
					<div class="col-xs-6">
						<label class="label-control" for="equipment-search">COMMODITY</label>
						<input type="text" class="form-control" id="equipment-search" name="commodity" value="{{ old('commodity') }}" placeholder="Commodity Search">
					</div>
					<div class="col-xs-3">
						<label class="label-control" for="load_type">LOAD TYPE</label>
						<select name="load_type" id="load_type" class="form-control" required>
							@if(old('load_type'))<option value="{{ old('load_type') }}">{{ old('load_type') }}</option> @else <option></option> @endif
							<option value="FULL">FULL</option>
							<option value="PARTIAL">PARTIAL</option>
						</select>
					</div>
					<div class="col-xs-3">
						<label class="label-control" for="customer-search-loadlist">CUSTOMER</label>
						<input type="text" class="form-control bid_customer" id="customer-search-loadlist" name="customer" value="{{ old('customer') }}" required>
					</div>

				</div>

				<div class="row">
					<div class="col-xs-3">
						<label class="label-control" for="miles">MILES</label>
						
							<input type="text" class="form-control" id="miles" name="miles" value="{{ $miles }}" required>
							
						
					</div>
					<div class="col-xs-3">
						<label class="label-control" for="billing_money">BILLING (do not enter zero)</label>
						<div class="input-group">
							<span class="input-group-addon">$</span>
							<input type="text" class="form-control" id="billing_money" name="billing_money" value="{{ old('billing_money') }}" placeholder="do not enter zero" required>
							<span class="input-group-addon">.00</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div style="margin-top: 10px;" class="col-xs-3">

						<button type="submit" id="new_quote_submit" class="btn btn-primary">NEW</button>



					</div>
				</div>




			</div>

		

	</form>

<iframe class='center-block' width='100%' height='400' frameborder='5' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?f=d&amp;source=s_d&amp;saddr="{{ $pick_city . ', ' . $pick_state }}"&amp;daddr="{{ $delivery_city . ', ' . $delivery_state }}"&amp;hl=en&amp;geocode=FWICfwIdGuDG-inty_TQPCwOiDEAwMAJrabgrw%3BFbpmTQIdlKqf-in5ju36qbTYhzFb4Lsiyuo5vg&amp;aq=&amp;sll=40.00132,-82.909012&amp;sspn=0.397649,0.98053&amp;mra=ls&amp;ie=UTF8&amp;t=m&amp;ll=40.25279,-88.91443&amp;spn=3.250649,2.569472&amp;output=embed'></iframe>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Per Mile Rates</h3>
  </div>
  <div class="panel-body">
    
  <ul id="duel_columns" style="list-style-type: none;">
    <li>.50 = $<?php echo $miles * .50 ?></li>
    <li>.60 = $<?php echo $miles * .60 ?></li>
    <li>.65 = $<?php echo $miles * .65 ?></li>
    <li>.70 = $<?php echo $miles * .70 ?></li>
    <li>.75 = $<?php echo $miles * .75 ?></li>
    <li>.80 = $<?php echo $miles * .80 ?></li>
    <li>.85 = $<?php echo $miles * .85 ?></li>
    <li>.90 = $<?php echo $miles * .90 ?></li>
    <li>.95 = $<?php echo $miles * .95 ?></li>
    <li>1.05 = $<?php echo $miles * 1.05 ?></li>
    <li>1.10 = $<?php echo $miles * 1.10 ?></li>
    <li>1.15 = $<?php echo $miles * 1.15 ?></li>
    <li>1.20 = $<?php echo $miles * 1.20 ?></li>
	<li>1.25 = $<?php echo $miles * 1.25 ?></li>
    <li>1.30 = $<?php echo $miles * 1.30 ?></li>
    <li>1.35 = $<?php echo $miles * 1.35 ?></li>
    <li>1.40 = $<?php echo $miles * 1.40 ?></li>
    <li>1.50 = $<?php echo $miles * 1.50 ?></li>
    <li>1.55 = $<?php echo $miles * 1.55 ?></li>
    <li>1.60 = $<?php echo $miles * 1.60 ?></li>
    <li>1.65 = $<?php echo $miles * 1.65 ?></li>
    <li>1.70 = $<?php echo $miles * 1.70 ?></li>
    <li>1.75 = $<?php echo $miles * 1.75 ?></li>
    <li>1.80 = $<?php echo $miles * 1.80 ?></li>
    <li>1.85 = $<?php echo $miles * 1.85 ?></li>
    <li>1.90 = $<?php echo $miles * 1.90 ?></li>
    <li>1.95 = $<?php echo $miles * 1.95 ?></li>
    <li>2.00 = $<?php echo $miles * 2.00 ?></li>
    <li>2.05 = $<?php echo $miles * 2.05 ?></li>
    <li>2.10 = $<?php echo $miles * 2.10 ?></li>
    <li>2.15 = $<?php echo $miles * 2.15 ?></li>
    <li>2.20 = $<?php echo $miles * 2.20 ?></li>
    <li>2.25 = $<?php echo $miles * 2.25 ?></li>
    <li>2.30 = $<?php echo $miles * 2.30 ?></li>
    <li>2.35 = $<?php echo $miles * 2.35 ?></li>
    <li>2.40 = $<?php echo $miles * 2.40 ?></li>
    <li>2.45 = $<?php echo $miles * 2.45 ?></li>
    <li>2.50 = $<?php echo $miles * 2.50 ?></li>
    <li>2.60 = $<?php echo $miles * 2.60 ?></li>
    <li>2.70 = $<?php echo $miles * 2.70 ?></li>
    <li>2.75 = $<?php echo $miles * 2.75 ?></li>
    <li>2.80 = $<?php echo $miles * 2.80 ?></li>
    <li>2.90 = $<?php echo $miles * 2.90 ?></li>
    <li>2.95 = $<?php echo $miles * 2.95 ?></li>
    <li>3.00 = $<?php echo $miles * 3.00 ?></li>
    <li>3.10 = $<?php echo $miles * 3.10 ?></li>
    <li>3.20 = $<?php echo $miles * 3.20 ?></li>
    <li>3.25 = $<?php echo $miles * 3.25 ?></li>
    <li>3.30 = $<?php echo $miles * 3.30 ?></li>
    <li>3.40 = $<?php echo $miles * 3.40 ?></li>
    <li>3.50 = $<?php echo $miles * 3.50 ?></li>
    <li>3.75 = $<?php echo $miles * 3.75 ?></li>
    <li>4.00 = $<?php echo $miles * 4.00 ?></li>
    <li>4.25 = $<?php echo $miles * 4.25 ?></li>
    <li>4.50 = $<?php echo $miles * 4.50 ?></li>
    <li>4.75 = $<?php echo $miles * 4.75 ?></li>
    <li>5.00 = $<?php echo $miles * 5.00 ?></li>
    <li>5.25 = $<?php echo $miles * 5.25 ?></li>
    <li>5.50 = $<?php echo $miles * 5.50 ?></li>
    <li>5.75 = $<?php echo $miles * 5.75 ?></li>
    <li>6.00 = $<?php echo $miles * 6.00 ?></li>
    

    </ul>
  </div>
</div>





</div>

<h2 class="text-center text-success">Results: Exact Pick City</h2>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Pick</th>
        <th>Delivery</th>
        <th>Customer</th>
        <th>Commodity</th>
        <th>Load Type</th>
        <th>Urgency</th>
        <th>Billed</th>
        <th>Per Mile</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>
      @foreach($exact_loads as $load)
      	<?php
			
			$billing_money = $load->billing_money;
      		
      		$miles = $load->miles;

      		$per_mile = round($billing_money / $miles, 2);

			$myvalue = $load->customer;
			$arr = explode(' ',trim($myvalue));
			
			// $name = explode("@", $load->created_by);
			// $email_prefix = $name[0];
		?>
		
      <tr class="loadlist_row">
        <td>{{ $load->pick_city . ', ' . $load->pick_state }}</td>
        <td>{{ $load->delivery_city . ', ' . $load->delivery_state . ' (' . $load->miles . 'mi.)' }}</td>
        <td>{{ $arr[0] }}</td>
        <td>{{ substr($load->commodity, 0, 67) }} {{ strlen($load->commodity) > 67 ? "..." : "" }}</td>
        <td>{{ $load->load_type }}</td>
        <td>{{ $load->urgency }}</td>
        <td>{{ '$' . $load->billing_money }}</td>
        <td>{{ $per_mile }}</td>
        <td>{{ (date("m/d g:ia", strtotime($load->created_at))) }}</td>
      </tr>
     @endforeach
    </tbody>
  </table>



<h2 class="text-center text-success">Results: ST to ST</h2>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Pick</th>
        <th>Delivery</th>
        <th>Customer</th>
        <th>Commodity</th>
        <th>Load Type</th>
        <th>Urgency</th>
        <th>Billed</th>
        <th>Per Mile</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>
      @foreach($matching_loads as $load)
      	<?php
			
			$billing_money = $load->billing_money;
      		
      		$miles = $load->miles;

      		$per_mile = round($billing_money / $miles, 2);

			$myvalue = $load->customer;
			$arr = explode(' ',trim($myvalue));
			
			// $name = explode("@", $load->created_by);
			// $email_prefix = $name[0];
		?>
		
      <tr class="loadlist_row">
        <td>{{ $load->pick_city . ', ' . $load->pick_state }}</td>
        <td>{{ $load->delivery_city . ', ' . $load->delivery_state . ' (' . $load->miles . 'mi.)' }}</td>
        <td>{{ $arr[0] }}</td>
        <td>{{ substr($load->commodity, 0, 67) }} {{ strlen($load->commodity) > 67 ? "..." : "" }}</td>
        <td>{{ $load->load_type }}</td>
        <td>{{ $load->urgency }}</td>
        <td>{{ '$' . $load->billing_money }}</td>
        <td>{{ $per_mile }}</td>
        <td>{{ (date("m/d g:ia", strtotime($load->created_at))) }}</td>
      </tr>
     @endforeach
    </tbody>
  </table>






@endsection