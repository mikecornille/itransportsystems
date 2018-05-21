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


@if (session('status'))
    <div class="alert alert-success alert-dismissible">
        
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session('status') }}</strong> Click the X at the far right to close this notification.
    </div>
@endif

<div style="padding-bottom:20px;" id="new_loadlist_map_display"></div>

<form role="form" class="form-horizontal" method="POST" action="/loadlist">
        
        {{ csrf_field() }}


    <div id="loadlist_div">
    
      <div class="form-group">
      <div class="row">
            <div class="col-xs-3">
                <label class="label-control" for="customer-search-loadlist">Customer Search</label>
                <input type="text" class="form-control" id="customer-search-loadlist" placeholder="Customer Search">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="pick_zip_loadlist_search">Pick Zip</label>
                <input type="text" class="form-control" id="pick_zip_loadlist_search">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="delivery_zip_loadlist_search">Delivery Zip</label>
                <input type="text" class="form-control" id="delivery_zip_loadlist_search">
            </div>
            <div class="col-xs-3">
            	<div class="btn-group">
			  <button type="submit" id="newCustomerSubmit" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> NEW</button>
			  <button type="button" id="newCustomerSubmit" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <span class="caret"></span>
			    <span class="sr-only">Toggle Dropdown</span>
			  </button>
			  <ul class="dropdown-menu">
			    <li><a href="{{ URL::to('/truckstopPost') }}">TRUCKSTOP</a></li>
			    <li><a href="{{ URL::to('/datPost') }}">DAT</a></li>
			    <li><a href="{{ URL::to('/truckerPathPost') }}">TRUCKER PATH</a></li>
			    <li><a href="{{ URL::to('/searchLoadlist') }}">SEARCH LOADLIST</a></li>
			    
			  </ul>
			</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <label class="label-control" for="customer_id">CUSTOMER</label>
                <input type="text" class="form-control" id="customer_id" name="customer" value="{{ old('customer') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="urgency">URGENCY</label>
                	<select name="urgency" id="urgency" class="form-control">
					    @if(old('urgency'))<option value="{{ old('urgency') }}">{{ old('urgency') }}</option> @else <option></option> @endif
					    <option value="Has Time">Has Time</option>
						<option value="Caller">Caller</option>
						<option value="Hot">Hot</option>
						<option value="Screaming">Screaming</option>
						<option value="Fossilized">Fossilized</option>
						<option value="Stabber">Stabber</option>
						<option value="Booked">Booked</option>
						<option value="Get Numbers">Get Numbers</option>
						<option value="Quote">Quote</option>
						<option value="Hold">Hold</option>
					</select>
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="load_type">LOAD TYPE</label>
                <select name="load_type" id="load_type" class="form-control">
					@if(old('load_type'))<option value="{{ old('load_type') }}">{{ old('load_type') }}</option> @else <option></option> @endif
					<option value="FULL">FULL</option>
					<option value="PARTIAL">PARTIAL</option>
				</select>
			</div>
            <div class="col-xs-3">
                <label class="label-control" for="trailer_type">TRAILER TYPE</label>
                <select name="trailer_type" id="trailer_type" class="form-control">
					@if(old('trailer_type'))<option value="{{ old('trailer_type') }}">{{ old('trailer_type') }}</option> @else <option></option> @endif
					<option value="CONG">Conestoga</option>
					<option value="DA">Drive Away</option>
					<option value="DD">Double Drop</option>
					<option value="F">Flatbed</option>
					<option value="FWS">Flatbed w/Sides</option>
					<option value="FA">Flatbed Air-Ride</option>
					<option value="FEXT">Stretch Flatbed</option>
					<option value="FSD">Flat or Step Deck</option>
					<option value="FSDV">Flatbed, Step Deck, Van</option>
					<option value="FV">Van or Flatbed</option>
					<option value="HS">Hot Shot</option>
					<option value="PO">Power Only</option>
					<option value="RGN">Removable Goose Multi-Axle Heavy</option>
					<option value="RGNE">RGN Extendable</option>
					<option value="SD">Step Deck</option>
					<option value="SDL">Step Deck w/Loading Ramps</option>
					<option value="SDRG">Step Deck or Removable Gooseneck</option>
					<option value="V">Van</option>
					<option value="LAF">Landoll</option>
					<option value="AUTO">Auto Carrier</option>
				</select>
            </div>

            
        </div>

        <div class="row">
            <div class="col-xs-3">
                <label class="label-control" for="pick_city">PICK CITY</label>
                <input type="text" class="form-control" id="pick_city" name="pick_city" value="{{ old('pick_city') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="pick_state">STATE</label>
                <input type="text" class="form-control" id="pick_state" name="pick_state" value="{{ old('pick_state') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="datepicker_pick_loadlist">READY DATE</label>
                <input type="text" class="form-control" id="datepicker_pick_loadlist" name="pick_date" value="{{ old('pick_date') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="pick_time">READY TIME</label>
                <select name="pick_time" id="pick_time" class="form-control">
		            @if(old('pick_time'))<option value="{{ old('pick_time') }}">{{ old('pick_time') }}</option> @else <option></option> @endif
		            <option value="0600">0600</option>
		            <option value="0630">0630</option>
		            <option value="0700">0700</option>
		            <option value="0730">0730</option>
		            <option value="0800">0800</option>
		            <option value="0830">0830</option>
		            <option value="0900">0900</option>
		            <option value="0930">0930</option>
		            <option value="1000">1000</option>
		            <option value="1030">1030</option>
		            <option value="1100">1100</option>
		            <option value="1130">1130</option>
		            <option value="1200">1200</option>
		            <option value="1230">1230</option>
		            <option value="1300">1300</option>
		            <option value="1330">1330</option>
		            <option value="1400">1400</option>
		            <option value="1430">1430</option>
		            <option value="1500">1500</option>
		            <option value="1530">1530</option>
		            <option value="1600">1600</option>
		            <option value="1630">1630</option>
		            <option value="1700">1700</option>
		            <option value="1730">1730</option>
		            <option value="1800">1800</option>
		            <option value="1830">1830</option>
		            <option value="1900">1900</option>
		            <option value="1930">1930</option>
		            <option value="2000">2000</option>
		            <option value="2030">2030</option>
		            <option value="2100">2100</option>
		            <option value="2130">2130</option>
		            <option value="2200">2200</option>
		            <option value="2230">2230</option>
		            <option value="2300">2300</option>
		            <option value="2330">2330</option>
		            <option value="2400">2400</option>
          		</select>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-3">
                <label class="label-control" for="delivery_city">DELIVERY CITY</label>
                <input type="text" class="form-control" id="delivery_city" name="delivery_city" value="{{ old('delivery_city') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="delivery_state">STATE</label>
	                <div class="input-group">
	                	<input type="text" class="form-control" id="delivery_state" name="delivery_state" value="{{ old('delivery_state') }}">
	 						<span class="input-group-btn">
                                <button class="btn btn-success" id="loadlist_map" type="button">MAP</button>
                            </span>
	 				</div>           
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="datepicker_delivery_loadlist">DELIVERY BY DATE</label>
                <input type="text" class="form-control" id="datepicker_delivery_loadlist" name="delivery_date" value="{{ old('delivery_date') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="delivery_time">DELIVERY BY TIME</label>
                <select name="delivery_time" id="delivery_time" class="form-control">
			            @if(old('delivery_time'))<option value="{{ old('delivery_time') }}">{{ old('delivery_time') }}</option> @else <option></option> @endif
			            <option value="0600">0600</option>
			            <option value="0630">0630</option>
			            <option value="0700">0700</option>
			            <option value="0730">0730</option>
			            <option value="0800">0800</option>
			            <option value="0830">0830</option>
			            <option value="0900">0900</option>
			            <option value="0930">0930</option>
			            <option value="1000">1000</option>
			            <option value="1030">1030</option>
			            <option value="1100">1100</option>
			            <option value="1130">1130</option>
			            <option value="1200">1200</option>
			            <option value="1230">1230</option>
			            <option value="1300">1300</option>
			            <option value="1330">1330</option>
			            <option value="1400">1400</option>
			            <option value="1430">1430</option>
			            <option value="1500">1500</option>
			            <option value="1530">1530</option>
			            <option value="1600">1600</option>
			            <option value="1630">1630</option>
			            <option value="1700">1700</option>
			            <option value="1730">1730</option>
			            <option value="1800">1800</option>
			            <option value="1830">1830</option>
			            <option value="1900">1900</option>
			            <option value="1930">1930</option>
			            <option value="2000">2000</option>
			            <option value="2030">2030</option>
			            <option value="2100">2100</option>
			            <option value="2130">2130</option>
			            <option value="2200">2200</option>
			            <option value="2230">2230</option>
			            <option value="2300">2300</option>
			            <option value="2330">2330</option>
			            <option value="2400">2400</option>
          </select>
            </div>
        </div>
		<div class="row">
           <div class="col-xs-8">
                <label class="label-control" for="equipment-search">COMMODITY</label>
                <input type="text" class="form-control" id="equipment-search" name="commodity" value="{{ old('commodity') }}" placeholder="Commodity Search">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="special_instructions">SPECIAL INSTRUCTIONS</label>
                <input type="text" class="form-control" id="special_instructions" name="special_instructions" value="{{ old('special_instructions') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-3">
                <label class="label-control" for="length">LENGTH</label>
                <input type="text" class="form-control" id="length" name="length" value="{{ old('length') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="width">WIDTH</label>
                <input type="text" class="form-control" id="width" name="width" value="{{ old('width') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="height">HEIGHT</label>
                <input type="text" class="form-control" id="height" name="height" value="{{ old('height') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="weight">WEIGHT</label>
                <input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-3">
                <label class="label-control" for="miles">MILES</label>
                <div class="input-group">
                <input type="text" class="form-control" id="miles" name="miles" value="{{ old('miles') }}">
                	<span class="input-group-btn">
        				<button class="btn btn-default" id="miles_loadlist" type="button"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span></button>
      				</span>
                </div>
            </div>
            

            <div class="col-xs-3">
            	<label class="label-control" for="billing_money">BILLING MONEY</label>
            		<div class="input-group">
						<span class="input-group-addon">$</span>
				  			<input type="text" class="form-control" id="billing_money" name="billing_money" value="{{ old('billing_money') }}" placeholder="Billing Amount">
				  		<span class="input-group-addon">.00</span>
					</div>
			</div>

			<div class="col-xs-3">
            	<label class="label-control" for="offer_money">OFFER MONEY</label>
            		<div class="input-group">
						<span class="input-group-addon">$</span>
				  			<input type="text" class="form-control" id="offer_money" name="offer_money" value="{{ old('offer_money') }}" placeholder="Offer Amount">
				  		<span class="input-group-addon">.00</span>
					</div>
			</div>

			<div class="col-xs-3">
            	<label class="label-control" for="post_money">POST MONEY</label>
            		<div class="input-group">
						<span class="input-group-addon">$</span>
				  			<input type="text" class="form-control" id="post_money" name="post_money" value="{{ old('post_money') }}" placeholder="Post Amount">
				  		<span class="input-group-addon">.00</span>
					</div>
			</div>
        </div>
        
        
		

		</div>
		
		</div>

</form>



<div id="mile_calc" style="font-size: small;"></div>


</div>

<h1 class="text-center text-success">Short List</h1>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Pick</th>
        <th>Delivery</th>
        <th>Trailer</th>
        <th>Ready Date</th>
        <th>Deliver By</th>
        <th>Customer</th>
        <th>Urgency</th>
        <th>Load Type</th>
        <th>Commodity</th>
        <th>Notes</th>
        <th>Name</th>
        <th>Dims</th>
        <th>Offer</th>
        <th>Post</th>
        <th>Mile</th>
        <th>Billing</th>
        <th>Margin</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($grouped as $load)
      	<?php


			$billing_money = $load[0]->billing_money;

			$offer_money = $load[0]->offer_money;

			$difference = $billing_money - $offer_money;

			$margin = $difference / $billing_money;

			$profitMargin = round((float)$margin * 100 );

			$myvalue = $load[0]->customer;
			$arr = explode(' ',trim($myvalue));
			
			$name = explode("@", $load[0]->created_by);
			$email_prefix = $name[0];


			$diesel_fuel_gallon = 2.90;
			$miles_per_gallon = 7; 
			
			$number_of_gallons = $load[0]->miles / $miles_per_gallon;
			$total_fuel_cost = $diesel_fuel_gallon * $number_of_gallons;

			$total_fuel_cost_rounded = round((float)$total_fuel_cost * 1 );


			$per_mile = $load[0]->offer_money / $load[0]->miles;
			$rounded_per_mile = round($per_mile, 2);

		?>
		
      <tr class="loadlist_row alt-colors">
        <td>{{ $load[0]->pick_city . ', ' . $load[0]->pick_state }}</td>
        <td>{{ $load[0]->delivery_city . ', ' . $load[0]->delivery_state . ' (' . $load[0]->miles . 'mi : ' . '$' . $total_fuel_cost_rounded . ')' }}</td>
        <td>{{ $load[0]->trailer_type }}</td>
        <td>{{ date("m/d", strtotime($load[0]->pick_date)) . ' ' . (date("g:ia", strtotime($load[0]->pick_time))) }}</td>
        <td>{{ date("m/d", strtotime($load[0]->delivery_date)) . ' ' . (date("g:ia", strtotime($load[0]->delivery_time))) }}</td>
        <td>{{ $arr[0] }}</td>
        
		@if ($load[0]->urgency === 'Screaming')
        <td class="text-danger">{{ $load[0]->urgency }}</td>
        @elseif ($load[0]->urgency === 'Fossilized')
        <td class="text-warning">{{ $load[0]->urgency }}</td>
        @elseif ($load[0]->urgency === 'Stabber')
        <td class="text-danger">{{ $load[0]->urgency }}</td>
        @else
        <td>{{ $load[0]->urgency }}</td>
        @endif
        
		<td>{{ $load[0]->load_type }}</td>
		

		<td><a href="#" class="inactiveLink" title="Commodity" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $load[0]->commodity }}">{{ substr($load[0]->commodity, 0, 25) }} {{ strlen($load[0]->commodity) > 25 ? "..." : "" }}</a></td>
		
		<td><a href="#" class="inactiveLink" title="Special Instructions" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $load[0]->special_instructions }}">{{ substr($load[0]->special_instructions, 0, 25) }} {{ strlen($load[0]->special_instructions) > 25 ? "..." : "" }}</a></td>

		
		

		<!-- <td><a href="{{ URL::to('/countIncomingCalls/' . $load[0]->id) }}" title="edit">{{ $load[0]->countIncomingCalls }}</a> | <a href="{{ URL::to('/countOutgoingCalls/' . $load[0]->id) }}" title="edit">{{ $load[0]->countOutgoingCalls }}</a> | <a href="{{ URL::to('/emailedOut/' . $load[0]->id) }}" title="edit">{{ $load[0]->emailedOut }}</a></td> -->

		@if ($load[0]->handler === 'KING')
        <td style="color: #65267F">{{ $load[0]->handler }}</td>
        
        @elseif ($load[0]->handler === 'BANSBERG')
        <td style="color: #FA7708">{{ $load[0]->handler }}</td>
        
        @elseif ($load[0]->handler === 'MESIK')
        <td style="color: #26597F">{{ $load[0]->handler }}</td>
     
        
        @elseif ($load[0]->handler === 'THOMPSON')
        <td style="color: #277F40">{{ $load[0]->handler }}</td>

        @elseif ($load[0]->handler === 'MARTINEZ')
        <td style="color: #E84C21">{{ $load[0]->handler }}</td>

        @else

        <td class="text-danger"></td>
        @endif
        

        <td>{{ $load[0]->length . '\' x ' . $load[0]->width . '\' x ' . $load[0]->height . '\' ' . $load[0]->weight . 'lbs' }}</td>
        
        
        <td class="offering_rate">${{ $load[0]->offer_money }}</td>
        <td class="margin">${{ $load[0]->post_money }}</td>
        <td class="per_mile">${{ $rounded_per_mile }}</td>
        <td class="billing_rate">${{ $load[0]->billing_money }}</td>
        <td class="margin">{{ $profitMargin }}%</td>
        <td><a href="{{ URL::to('/editLoadlist/' . $load[0]->id) }}" title="edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> | <a href="#" title="{{ $load[0]->created_by }}" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $load[0]->customer . ' ' . (date("m/d g:ia", strtotime($load[0]->created_at))) }}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a> | <a href="{{ URL::to('/duplicateLoadlist/' . $load[0]->id) }}" title="duplicate"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></a> | <a href="#" data-toggle="modal" data-target="#noteModal" title="make note"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a> | <a href="{{ URL::to('/newDateLoadlist/' . $load[0]->id) }}" title="post next day"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a> | <a href="{{ URL::to('/emailLoad/' . $load[0]->id) }}" title="email"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a> | <a href="{{ URL::to('/emailTruckOffer/' . $load[0]->id) }}" title="email truck template"><span class="glyphicon glyphicon-road" aria-hidden="true"></span></a> | <a onclick="return confirm('Are you sure?')" href="{{ URL::to('/deleteLoadlist/' . $load[0]->id) }}" title="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>


      </tr>
      
      @endforeach
    </tbody>
  </table>


<h1 class="text-center text-success">Available Loads</h1>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Pick</th>
        <th>Delivery</th>
        <th>Trailer</th>
        <th>Ready Date</th>
        <th>Deliver By</th>
        <th>Customer</th>
        <th>Urgency</th>
        <th>Load Type</th>
        <th>Commodity</th>
        <th>Notes</th>
        <!-- <th>I | O | E</th> -->
        <th>Name</th>
        <th>Dims</th>
        <th>Offer</th>
        <th>Post</th>
        <th>Mile</th>
        <th>Billing</th>
        <th>Margin</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($open_loads as $load)
      	<?php
			$billing_money = $load->billing_money;

			$offer_money = $load->offer_money;

			$difference = $billing_money - $offer_money;

			$margin = $difference / $billing_money;

			$profitMargin = round((float)$margin * 100 );

			$myvalue = $load->customer;
			$arr = explode(' ',trim($myvalue));
			
			$name = explode("@", $load->created_by);
			$email_prefix = $name[0];


			$diesel_fuel_gallon = 2.90;
			$miles_per_gallon = 7; 
			
			$number_of_gallons = $load->miles / $miles_per_gallon;
			$total_fuel_cost = $diesel_fuel_gallon * $number_of_gallons;

			$total_fuel_cost_rounded = round((float)$total_fuel_cost * 1 );


			$per_mile = $load->offer_money / $load->miles;
			$rounded_per_mile = round($per_mile, 2);

		?>
		
      <tr class="loadlist_row alt-colors">
        <td>{{ $load->pick_city . ', ' . $load->pick_state }}</td>
        <td>{{ $load->delivery_city . ', ' . $load->delivery_state . ' (' . $load->miles . 'mi : ' . '$' . $total_fuel_cost_rounded . ')' }}</td>
        <td>{{ $load->trailer_type }}</td>
        <td>{{ date("m/d", strtotime($load->pick_date)) . ' ' . (date("g:ia", strtotime($load->pick_time))) }}</td>
        <td>{{ date("m/d", strtotime($load->delivery_date)) . ' ' . (date("g:ia", strtotime($load->delivery_time))) }}</td>
        <td>{{ $arr[0] }}</td>
        
		@if ($load->urgency === 'Screaming')
        <td class="text-danger">{{ $load->urgency }}</td>
        @elseif ($load->urgency === 'Fossilized')
        <td class="text-warning">{{ $load->urgency }}</td>
        @elseif ($load->urgency === 'Stabber')
        <td class="text-danger">{{ $load->urgency }}</td>
        @else
        <td>{{ $load->urgency }}</td>
        @endif
        
		<td>{{ $load->load_type }}</td>
		

		<td><a href="#" class="inactiveLink" title="Commodity" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $load->commodity }}">{{ substr($load->commodity, 0, 25) }} {{ strlen($load->commodity) > 25 ? "..." : "" }}</a></td>
		
		<td><a href="#" class="inactiveLink" title="Special Instructions" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $load->special_instructions }}">{{ substr($load->special_instructions, 0, 25) }} {{ strlen($load->special_instructions) > 25 ? "..." : "" }}</a></td>

		
		

		<!-- <td><a href="{{ URL::to('/countIncomingCalls/' . $load->id) }}" title="edit">{{ $load->countIncomingCalls }}</a> | <a href="{{ URL::to('/countOutgoingCalls/' . $load->id) }}" title="edit">{{ $load->countOutgoingCalls }}</a> | <a href="{{ URL::to('/emailedOut/' . $load->id) }}" title="edit">{{ $load->emailedOut }}</a></td> -->

		@if ($load->handler === 'KING')
        <td style="color: #65267F">{{ $load->handler }}</td>
        
        @elseif ($load->handler === 'BANSBERG')
        <td style="color: #FA7708">{{ $load->handler }}</td>
        
        @elseif ($load->handler === 'MESIK')
        <td style="color: #26597F">{{ $load->handler }}</td>
     
        
        @elseif ($load->handler === 'THOMPSON')
        <td style="color: #277F40">{{ $load->handler }}</td>

        @elseif ($load->handler === 'MARTINEZ')
        <td style="color: #E84C21">{{ $load->handler }}</td>

        @else

        <td class="text-danger"></td>
        @endif
        

        <td>{{ $load->length . '\' x ' . $load->width . '\' x ' . $load->height . '\' ' . $load->weight . 'lbs' }}</td>
        
        
        <td class="offering_rate">${{ $load->offer_money }}</td>
        <td class="margin">${{ $load->post_money }}</td>
        <td class="per_mile">${{ $rounded_per_mile }}</td>
        <td class="billing_rate">${{ $load->billing_money }}</td>
        <td class="margin">{{ $profitMargin }}%</td>
        <td><a href="{{ URL::to('/editLoadlist/' . $load->id) }}" title="edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> | <a href="#" title="{{ $load->created_by }}" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $load->customer . ' ' . (date("m/d g:ia", strtotime($load->created_at))) }}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a> | <a href="{{ URL::to('/duplicateLoadlist/' . $load->id) }}" title="duplicate"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></a> | <a href="#" data-toggle="modal" data-target="#noteModal" title="make note"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a> | <a href="{{ URL::to('/newDateLoadlist/' . $load->id) }}" title="post next day"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a> | <a href="{{ URL::to('/emailLoad/' . $load->id) }}" title="email"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a> | <a href="{{ URL::to('/emailTruckOffer/' . $load->id) }}" title="email truck template"><span class="glyphicon glyphicon-road" aria-hidden="true"></span></a> | <a onclick="return confirm('Are you sure?')" href="{{ URL::to('/deleteLoadlist/' . $load->id) }}" title="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>


      </tr>
      
      @endforeach
    </tbody>
  </table>


 

 <h1 class="text-center text-success">Personal Load List</h1>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Pick</th>
        <th>Delivery</th>
        <th>Customer</th>
        <th>Urgency</th>
        <th>Load Type</th>
        <th>Commodity</th>
        <th>Notes</th>
        <th>Dims</th>
        <th>Trailer</th>
        <th>Ready Date</th>
        <th>Deliver By</th>
        <th>Offer</th>
        <th>Post</th>
        <th>Billing</th>
        <th>Margin</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($personal_loads as $personal)
      	<?php
			$billing_money = $personal->billing_money;

			$offer_money = $personal->offer_money;

			$difference = $billing_money - $offer_money;

			$margin = $difference / $billing_money;

			$profitMargin = round((float)$margin * 100 );

			$myvalue = $personal->customer;
			$arr = explode(' ',trim($myvalue));
			
			$name = explode("@", $personal->created_by);
			$email_prefix = $name[0];
		?>
		
      <tr class="loadlist_row alt-colors">
        <td>{{ $personal->pick_city . ', ' . $personal->pick_state }}</td>
        <td>{{ $personal->delivery_city . ', ' . $personal->delivery_state . ' (' . $personal->miles . 'mi.)' }}</td>
        <td>{{ $arr[0] }}</td>
        
		@if ($personal->urgency === 'Screaming')
        <td class="text-danger">{{ $personal->urgency }}</td>
        @else
        <td>{{ $personal->urgency }}</td>
        @endif
        
		<td>{{ $personal->load_type }}</td>
		<td><a href="#" class="inactiveLink" title="Commodity" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $personal->commodity }}">{{ substr($personal->commodity, 0, 25) }} {{ strlen($personal->commodity) > 25 ? "..." : "" }}</a></td>
		<td>{{ $personal->special_instructions }}</td>
        <td>{{ $personal->length . '\' x ' . $personal->width . '\' x ' . $personal->height . '\' ' . $personal->weight . 'lbs' }}</td>
        <td>{{ $personal->trailer_type }}</td>
        <td>{{ date("m/d", strtotime($personal->pick_date)) . ' ' . (date("g:ia", strtotime($personal->pick_time))) }}</td>
        <td>{{ date("m/d", strtotime($personal->delivery_date)) . ' ' . (date("g:ia", strtotime($personal->delivery_time))) }}</td>
        <td class="offering_rate">${{ $personal->offer_money }}</td>
        <td class="margin">${{ $personal->post_money }}</td>
        <td class="billing_rate">${{ $personal->billing_money }}</td>
        <td class="margin">{{ $profitMargin }}%</td>
        <td><a href="{{ URL::to('/editLoadlist/' . $personal->id) }}" title="edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> | <a href="#" title="{{ $personal->created_by }}" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $personal->customer . ' ' . (date("m/d g:ia", strtotime($personal->created_at))) }}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a> | <a href="{{ URL::to('/duplicateLoadlist/' . $personal->id) }}" title="duplicate"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></a> | <a href="#" data-toggle="modal" data-target="#noteModal" title="make note"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a> | <a href="{{ URL::to('/newDateLoadlist/' . $personal->id) }}" title="post next day"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a> | <a href="{{ URL::to('/emailLoad/' . $personal->id) }}" title="email"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a> | <a href="{{ URL::to('/emailTruckOffer/' . $personal->id) }}" title="email truck template"><span class="glyphicon glyphicon-road" aria-hidden="true"></span></a> | <a href="{{ URL::to('/deleteLoadlist/' . $personal->id) }}" title="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>


      </tr>

      
       
      @endforeach
    </tbody>
  </table>





<?php

date_default_timezone_set("America/Chicago");

$notetimestamp = date('m/d/Y g:ia');

?>





<!-- Modal -->
  <div class="modal fade" id="noteModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Write Note</h4>
        </div>
        <div class="modal-body">
          <form role="form" class="form-horizontal" method="POST" action="/newNote">
				<input type="hidden" id="time_name_stamp" name="time_name_stamp" value="{{ $notetimestamp . ' ' . \Auth::user()->name }}">
        			{{ csrf_field() }}
						<div class="well">
      						<h2 class="text-center">ITS Notes</h2> 
      							<div class="form-group">
        							<div class="row">
            							<div class="col-xs-9">
                							<input type="text" class="form-control" id="notes" name="notes" value="{{ old('notes') }}" placeholder="Specify the location, first name, phone, and reason for call">
            							</div>
            							<div class="col-xs-3">
                							<input type="text" class="form-control" id="dialed_out" name="dialed_out" value="{{ old('dialed_out') }}" placeholder="Dialed/Emailed Out">
            							</div>
        							</div>
											<button type="submit" class="btn btn-primary" id="submit_new_note"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> NEW</button>
								</div>
						</div>
			</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>





@endsection