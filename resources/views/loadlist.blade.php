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

<div style="padding-bottom:20px;" id="loadlist_map_display"></div>

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
                <label class="label-control" for="commodity">COMMODITY</label>
                <input type="text" class="form-control" id="commodity" name="commodity" value="{{ old('commodity') }}">
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




<table class="table table-hover">
    <thead>
      <tr>
        <th>Pick</th>
        <th>Delivery</th>
        <th>Customer</th>
        <th>Miles</th>
        <th>Urgency</th>
        <th>Load Type</th>
        <th>Creator</th>
        <th>Trailer Type</th>
        <th>Ready Date</th>
        <th>Deliver By</th>
        <th>Info</th>
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
		?>
		
      <tr class="loadlist_row">
        <td>{{ $load->pick_city . ', ' . $load->pick_state }}</td>
        <td>{{ $load->delivery_city . ', ' . $load->delivery_state }}</td>
        <td>{{ $arr[0] }}</td>
        <td>{{ $load->miles }}</td>
        <td>{{ $load->urgency }}</td>
        <td>{{ $load->load_type }}</td>
        <td>{{ $email_prefix }}</td>
        <td>{{ $load->trailer_type }}</td>
        <td>{{ date("m/d", strtotime($load->pick_date)) . ' ' . (date("g:ia", strtotime($load->pick_time))) }}</td>
        <td>{{ date("m/d", strtotime($load->delivery_date)) . ' ' . (date("g:ia", strtotime($load->delivery_time))) }}</td>
        <td><a href=".coll{{ $load->id }}" data-toggle="collapse"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></td>
      </tr>
      

      <tr class="collapse coll{{ $load->id }}">
      	<td>{{ $load->commodity }} - {{ $load->length . 'ft x ' . $load->width . 'ft x ' . $load->height . 'ft ' . $load->weight . 'lbs' }}</td>
      	<td>{{ $load->special_instructions }}</td>
      </tr>
      <tr class="collapse coll{{ $load->id }}">
      	<td class="offering_rate">OFFER: ${{ $load->offer_money }} POST: ${{ $load->post_money }}</td>
      	<td class="margin">PM: {{ $profitMargin }}%</td>
      	<td class="billing_rate">B: ${{ $load->billing_money }}</td>
      </tr>
      <tr class="collapse coll{{ $load->id }}">
      	<td>
      		<a href="{{ URL::to('/editLoadlist/' . $load->id) }}" title="edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> | <a href="#" title="{{ $load->created_by }}" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $load->customer . ' ' . (date("m/d g:ia", strtotime($load->created_at))) }}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a> | <a href="{{ URL::to('/duplicateLoadlist/' . $load->id) }}" title="duplicate"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></a> | <a href="#" data-toggle="modal" data-target="#noteModal" title="make note"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a> | <a href="{{ URL::to('/newDateLoadlist/' . $load->id) }}" title="post next day"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a> | <a href="{{ URL::to('/emailLoad/' . $load->id) }}" title="email"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a> | <a href="{{ URL::to('/deleteLoadlist/' . $load->id) }}" title="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
      	</td>
      </tr>
     

      
       
      @endforeach
    </tbody>
  </table>

<h1 class="text-center">Recent Quotes</h1>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Pick</th>
        <th>Delivery</th>
        <th>Customer</th>
        <th>Miles</th>
        <th>Urgency</th>
        <th>Load Type</th>
        <th>Creator</th>
        <th>Trailer Type</th>
        <th>Ready Date</th>
        <th>Deliver By</th>
        <th>Info</th>
      </tr>
    </thead>
    <tbody>
      @foreach($quote_loads as $quote)
      	<?php
			$billing_money = $quote->billing_money;

			$offer_money = $quote->offer_money;

			$difference = $billing_money - $offer_money;

			$margin = $difference / $billing_money;

			$profitMargin = round((float)$margin * 100 );

			$myvalue = $quote->customer;
			$arr = explode(' ',trim($myvalue));
			
			$name = explode("@", $load->created_by);
			$email_prefix = $name[0];
		?>
		
      <tr class="loadlist_row">
        <td>{{ $quote->pick_city . ', ' . $quote->pick_state }}</td>
        <td>{{ $quote->delivery_city . ', ' . $quote->delivery_state }}</td>
        <td>{{ $arr[0] }}</td>
        <td>{{ $quote->miles }}</td>
        <td>{{ $quote->urgency }}</td>
        <td>{{ $quote->load_type }}</td>
        <td>{{ $email_prefix }}</td>
        <td>{{ $quote->trailer_type }}</td>
        <td>{{ date("m/d", strtotime($quote->pick_date)) . ' ' . (date("g:ia", strtotime($quote->pick_time))) }}</td>
        <td>{{ date("m/d", strtotime($quote->delivery_date)) . ' ' . (date("g:ia", strtotime($quote->delivery_time))) }}</td>
        <td><a href=".coll{{ $quote->id }}" data-toggle="collapse"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></td>
      </tr>
      

      <tr class="collapse coll{{ $quote->id }}">
      	<td>{{ $quote->commodity }} - {{ $quote->length . 'ft x ' . $quote->width . 'ft x ' . $quote->height . 'ft ' . $quote->weight . 'lbs' }}</td>
      	<td>{{ $quote->special_instructions }}</td>
      </tr>
      <tr class="collapse coll{{ $quote->id }}">
      	<td class="offering_rate">OFFER: ${{ $quote->offer_money }} POST: ${{ $quote->post_money }}</td>
      	<td class="margin">PM: {{ $profitMargin }}%</td>
      	<td class="billing_rate">B: ${{ $quote->billing_money }}</td>
      </tr>
      <tr class="collapse coll{{ $quote->id }}">
      	<td>
      		<a href="{{ URL::to('/editLoadlist/' . $quote->id) }}" title="edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> | <a href="#" title="{{ $quote->created_by }}" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $quote->customer . ' ' . (date("m/d g:ia", strtotime($quote->created_at))) }}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a> | <a href="{{ URL::to('/duplicateLoadlist/' . $quote->id) }}" title="duplicate"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></a> | <a href="#" data-toggle="modal" data-target="#noteModal" title="make note"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a> | <a href="{{ URL::to('/newDateLoadlist/' . $quote->id) }}" title="post next day"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a> | <a href="{{ URL::to('/emailLoad/' . $quote->id) }}" title="email"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a> | <a href="{{ URL::to('/deleteLoadlist/' . $quote->id) }}" title="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
      	</td>
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
          <h4 class="modal-title">Wrtie Note</h4>
        </div>
        <div class="modal-body">
          <form role="form" class="form-horizontal" method="POST" action="/newNote">
				<input type="hidden" id="time_name_stamp" name="time_name_stamp" value="{{ $notetimestamp . ' ' . \Auth::user()->name }} -">
        			{{ csrf_field() }}
						<div class="well">
      						<h2 class="text-center">ITS Notes</h2> 
      							<div class="form-group">
        							<div class="row">
            							<div class="col-xs-12">
                							<input type="text" class="form-control" id="notes" name="notes" value="{{ old('notes') }}" placeholder="Specify the location, first name, phone, and reason for call">
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