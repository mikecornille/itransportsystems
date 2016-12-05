
@extends('layouts.app')

@section('content')





<div class="page-header">
<h2 class="text-center"><a href="{{ url('/home') }}">Back to Home</a></h2>
	<h1 class="text-center">PRO # {{ $info->id }} <small> created by {{ $info->created_by }} on {{ $info->creation_date }}</small></h1>
</div>

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

<form role="form" class="form-horizontal" method="POST" action="/load/{{ $info->id }}">
        
        {{ method_field('PATCH') }}

        {{ csrf_field() }}


<div id="customer">
    <div class="well">
      <div class="form-group">
        <div class="row">
            <div class="col-xs-12">
                <label class="label-control" for="customer_name">CUSTOMER</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $info->customer_name }}">
            </div>
            <div class="col-xs-12">
                <label class="label-control" for="customer_address">Address</label>
                <input type="text" class="form-control" id="customer_address" name="customer_address" value="{{ $info->customer_address }}">
            </div>
            <div class="col-xs-12">
                <label class="label-control" for="customer_city">City</label>
                <input type="text" class="form-control" id="customer_city" name="customer_city" value="{{ $info->customer_city }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_state">State</label>
                <input type="text" class="form-control" id="customer_state" name="customer_state" value="{{ $info->customer_state }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_zip">Zip</label>
                <input type="text" class="form-control" id="customer_zip" name="customer_zip" value="{{ $info->customer_zip }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_contact">Contact</label>
                <input type="text" class="form-control" id="customer_contact" name="customer_contact" value="{{ $info->customer_contact }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_email">Email</label>
                <input type="text" class="form-control" id="customer_email" name="customer_email" value="{{ $info->customer_email }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_phone">Phone</label>
                <input type="text" class="form-control" id="customer_phone" name="customer_phone" value="{{ $info->customer_phone }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_fax">Fax</label>
                <input type="text" class="form-control" id="customer_fax" name="customer_fax" value="{{ $info->customer_fax }}">
            </div>
            <div class="col-xs-12">
                <label class="label-control" for="quick_status_notes">Status Notes/Check Memo</label>
                <input type="text" class="form-control" id="quick_status_notes" name="quick_status_notes" value="{{ $info->quick_status_notes }}">
            </div>
             <div class="col-xs-12">
                <label for="cohort_message" class="label-control">Internal Email Recipient</label>
                    <select name="cohort_message" id="cohort_message" class="form-control">          
                      <option value="Please Choose One">Please Choose One</option>
                      <option value="joem@itransys.com">Joe Mowrer</option>
                      <option value="mikeb@itransys.com">Mike Bruschuk</option>
                      <option value="mattk@itransys.com">Matt King</option>
                      <option value="mattc@itransys.com">Matt Carnahan</option>
                      <option value="mikec@itransys.com">Mike Cornille</option>
                      <option value="ronc@itransys.com">Ron Cornille</option>
                      <option value="robert@itransys.com">Robert Bansberg</option>
                      <option value="aj@itransys.com">AJ Mesik</option>
                      <option value="lianey@itransys.com">Liane Cornille</option>
                      <option value="jennifer@itransys.com">Jennifer Wendell</option>
                      <option value="molly@itransys.com">Molly Karcz</option>
                      <option value="wanda@itransys.com">Wanda Giovingo</option>
                    </select>
            </div>
          </div> 
        </div> 
    </div> 
</div> 

<div id="carrier">
	<div class="well">
		<div class="form-group">
			<div class="row">
				<div class="col-xs-12">
					<label class="label-control" for="carrier_name">CARRIER</label>
                    <div class="input-group">
                    <input type="text" class="form-control" id="carrier_name" name="carrier_name" value="{{ $info->carrier_name }}">
                    <span class="input-group-btn">
        <button class="btn btn-secondary" type="button"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span></button>
      </span>
    </div>
				</div>
				<div class="col-xs-12">
					<label class="label-control" for="carrier_address">Address</label>
                    <input type="text" class="form-control" id="carrier_address" name="carrier_address" value="{{ $info->carrier_address }}">
				</div>
				<div class="col-xs-12">
					<label class="label-control" for="carrier_city">City</label>
                    <input type="text" class="form-control" id="carrier_city" name="carrier_city" value="{{ $info->carrier_city }}">
				</div>
				<div class="col-xs-6">
                    <label class="label-control" for="carrier_state">State</label>
                    <input type="text" class="form-control" id="carrier_state" name="carrier_state" value="{{ $info->carrier_state }}">
                </div>
                <div class="col-xs-6">
                    <label class="label-control" for="carrier_zip">Zip</label>
                    <input type="text" class="form-control" id="carrier_zip" name="carrier_zip" value="{{ $info->carrier_zip }}">
                </div>
                <div class="col-xs-6">
                    <label class="label-control" for="carrier_contact">Contact</label>
                    <input type="text" class="form-control" id="carrier_contact" name="carrier_contact" value="{{ $info->carrier_contact }}">
                </div>
                <div class="col-xs-6">
                    <label class="label-control" for="carrier_email">Email</label>
                    <input type="text" class="form-control" id="carrier_email" name="carrier_email" value="{{ $info->carrier_email }}">
                </div>
                <div class="col-xs-6">
                    <label class="label-control" for="carrier_phone">Phone</label>
                    <input type="text" class="form-control" id="carrier_phone" name="carrier_phone" value="{{ $info->carrier_phone }}">
                </div>
                <div class="col-xs-6">
                    <label class="label-control" for="carrier_fax">Fax</label>
                    <input type="text" class="form-control" id="carrier_fax" name="carrier_fax" value="{{ $info->carrier_fax }}">
                </div>
                <div class="col-xs-6">
                    <label class="label-control" for="carrier_driver_name">Driver Name</label>
                    <input type="text" class="form-control" id="carrier_driver_name" name="carrier_driver_name" value="{{ $info->carrier_driver_name }}">
                </div>
                <div class="col-xs-6">
                    <label class="label-control" for="carrier_driver_cell">Driver Cell</label>
                    <input type="text" class="form-control" id="carrier_driver_cell" name="carrier_driver_cell" value="{{ $info->carrier_driver_cell }}">
                </div>
      			<div class="col-xs-12">
        				<label for="trailer_type" class="label-control">Trailer Type</label>
          					<select name="trailer_type" id="trailer_type" class="form-control">
          					  <option value="{{ $info->trailer_type }}">{{ $info->trailer_type }}</option>
				              <option value="Please Choose One">Please Choose One</option>
				              <option value="45/96 FLATBED">45/96 FLATBED</option>
				              <option value="45/102 FLATBED">45/102 FLATBED</option>
				              <option value="48/96 FLATBED">48/96 FLATBED</option>
				              <option value="48/102 FLATBED">48/102 FLATBED</option>
				              <option value="48/102 FLATBED W/SIDES">48/102 FLATBED W/SIDES</option>
				              <option value="53/102 FLATBED">53/102 FLATBED</option>
				              <option value="53/102 FLATBED W/SIDES">53/102 FLATBED W/SIDES</option>
				              <option value="48/102 STEPDECK">48/102 STEPDECK</option>
				              <option value="48/102 STEPDECK W/RAMPS">48/102 STEPDECK W/RAMPS</option>
				              <option value="53/102 STEPDECK">53/102 STEPDECK</option>
				              <option value="53/102 STEPDECK W/RAMPS">53/102 STEPDECK W/RAMPS</option>
				              <option value="48/96 CONESTOGA">48/96 CONESTOGA</option>
				              <option value="48/102 CONESTOGA">48/102 CONESTOGA</option>
				              <option value="53/102 CONESTOGA">53/102 CONESTOGA</option>
				              <option value="48/102 STEP CONESTOGA">48/102 STEP CONESTOGA</option>
				              <option value="53/102 STEP CONESTOGA">53/102 STEP CONESTOGA</option>
				              <option value="20FT HOT SHOT">20FT HOT SHOT</option>
				              <option value="25FT HOT SHOT">25FT HOT SHOT</option>
				              <option value="30FT HOT SHOT">30FT HOT SHOT</option>
				              <option value="40FT HOT SHOT">40FT HOT SHOT</option>
				              <option value="48/102 DRY VAN">48/102 DRY VAN</option>
				              <option value="53/102 DRY VAN">53/102 DRY VAN</option>
				              <option value="POWER ONLY">POWER ONLY</option>
				              <option value="RGN LOWBOY">RGN LOWBOY</option>
				              <option value="MULTI 7-AXLE RGN LOWBOY">MULTI 7-AXLE RGN LOWBOY</option>
				              <option value="POWER ONLY">RGN EXTENDABLE</option>
				              <option value="RGN LOWBOY">DOUBLE DROP</option>
				              <option value="LOWBOY">LOWBOY</option>
				              <option value="LANDOLL">LANDOLL</option>
				              <option value="ROLLBACK">ROLLBACK</option>
				              <option value="AUTO CARRIER">AUTO CARRIER</option>
				              <option value="STRAIGHT TRUCK">STRAIGHT TRUCK</option>
          					</select>
      				</div>
    		</div>
		</div>
	</div>
</div>

<div id="origin">
  <div class="well">
    <div class="form-group">
        <div class="row">
          <div class="col-xs-12">
            <label class="label-control" for="pick_company">ORIGIN</label>
            <input type="text" class="form-control" id="pick_company" name="pick_company" value="{{ $info->pick_company }}">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="pick_address">Address</label>
            <input type="text" class="form-control" id="pick_address" name="pick_address" value="{{ $info->pick_address }}">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="pick_city">City</label>
            <input type="text" class="form-control" id="pick_city" name="pick_city" value="{{ $info->pick_city }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="pick_state">State</label>
            <input type="text" class="form-control" id="pick_state" name="pick_state" value="{{ $info->pick_state }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="pick_zip">Zip</label>
            <input type="text" class="form-control" id="pick_zip" name="pick_zip" value="{{ $info->pick_zip }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="pick_contact">Contact</label>
            <input type="text" class="form-control" id="pick_contact" name="pick_contact" value="{{ $info->pick_contact }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="pick_phone">Phone</label>
            <input type="text" class="form-control" id="pick_phone" name="pick_phone" value="{{ $info->pick_phone }}">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="pick_email">Email</label>
            <input type="text" class="form-control" id="pick_email" name="pick_email" value="{{ $info->pick_email }}">
          </div>
			<div class="col-xs-6">
                <label class="label-control" for="pick_date">Pick Date</label>
                <input type="text" class="form-control datepicker" id="datepicker" name="pick_date" value="{{ $info->pick_date }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control text-danger" for="pick_time">Time</label>
            		<select name="pick_time" id="pick_time" class="form-control">
            		  <option value="{{ $info->pick_time }}">{{ $info->pick_time }}</option>
					  <option value="0600">0600</option>
		              <option value="0630">0630</option>
		              <option value="0700" selected>0700</option>
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
            <div class="col-xs-6">
	          <label for="pick_status" class="label-control text-danger">Pick Status</label>
	            <select name="pick_status" id="pick_status" class="form-control">
	              <option value="{{ $info->pick_status }}">{{ $info->pick_status }}</option>
	              <option value="Open">Open</option>
	              <option value="Booked">Booked</option>
	              <option value="Loaded">Loaded</option>
	              <option value="Hold">Hold</option>
	              <option value="Cancelled">Cancelled</option>
	              <option value="TONU">TONU</option>
	              <option value="Towing">Towing</option>
	            </select>
        	</div>
		</div> 
    </div> 
  </div> 
</div> 

<div id="delivery">
  <div class="well">
    <div class="form-group">
        <div class="row">
          <div class="col-xs-12">
            <label class="label-control" for="delivery_company">DESTINATION</label>
            <input type="text" class="form-control" id="delivery_company" name="delivery_company" value="{{ $info->delivery_company }}">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="delivery_address">Address</label>
            <input type="text" class="form-control" id="delivery_address" name="delivery_address" value="{{ $info->delivery_address }}">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="delivery_city">City</label>
            <input type="text" class="form-control" id="delivery_city" name="delivery_city" value="{{ $info->delivery_city }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="delivery_state">State</label>
            <input type="text" class="form-control" id="delivery_state" name="delivery_state" value="{{ $info->delivery_state }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="delivery_zip">Zip</label>
            <input type="text" class="form-control" id="delivery_zip" name="delivery_zip" value="{{ $info->delivery_zip }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="delivery_contact">Contact</label>
            <input type="text" class="form-control" id="delivery_contact" name="delivery_contact" value="{{ $info->delivery_contact }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="delivery_phone">Phone</label>
            <input type="text" class="form-control" id="delivery_phone" name="delivery_phone" value="{{ $info->delivery_phone }}">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="delivery_email">Email</label>
            <input type="text" class="form-control" id="delivery_email" name="delivery_email" value="{{ $info->delivery_email }}">
          </div>
			<div class="col-xs-6">
                <label class="label-control" for="delivery_date">Delivery Date</label>
                <input type="text" class="form-control datepicker" id="datepicker2" name="delivery_date" value="{{ $info->delivery_date }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control text-danger" for="delivery_time">Time</label>
            	<select name="delivery_time" id="delivery_time" class="form-control">
            		  <option value="{{ $info->delivery_time }}">{{ $info->delivery_time }}</option>
		              <option value="0600">0600</option>
		              <option value="0630">0630</option>
		              <option value="0700" selected>0700</option>
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
        <div class="col-xs-6">
          <label for="pick_status" class="label-control text-danger">Del Status</label>
            <select name="delivery_status" id="delivery_status" class="form-control">
              <option value="{{ $info->delivery_status }}">{{ $info->delivery_status }}</option>
              <option value="Open">Open</option>
              <option value="Delivered">Delivered</option>
              <option value="Towing">Towing</option>
            </select>
        </div>
	  </div> 
    </div> 
  </div> 
</div> 

<div id="reference">
  <div class="well">
    <div class="form-group">
      <div class="row">
        <div class="col-xs-12">
          <label class="label-control" for="po_number">PO #</label>
          <input type="text" class="form-control" id="po_number" name="po_number" value="{{ $info->po_number }}">
        </div>
        <div class="col-xs-12">
          <label class="label-control" for="ref_number">REF #</label>
          <input type="text" class="form-control" id="ref_number" name="ref_number" value="{{ $info->ref_number }}">
        </div>
        <div class="col-xs-12">
          <label class="label-control" for="bol_number">BOL #</label>
          <input type="text" class="form-control" id="bol_number" name="bol_number" value="{{ $info->bol_number }}">
        </div>
       	<div class="col-xs-12">
          <label class="label-control" for="vendor_invoice_number">Vendor Invoice #</label>
          <input type="text" class="form-control" id="vendor_invoice_number" name="vendor_invoice_number" value="{{ $info->vendor_invoice_number }}">
        </div>
        <div class="col-xs-12">
          <label class="label-control" for="vendor_invoice_date">Vendor Invoice Date</label>
          <input type="text" class="form-control datepicker" id="datepicker3" name="vendor_invoice_date" value="{{ $info->vendor_invoice_date }}">
    	</div>


      <div class="btn-group" id="action_buttons">
  <button type="button" class="btn btn-primary">Actions</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{ URL::to('/getInvoicePDF/' . $info->id) }}">Print Invoice</a></li>
    <li><a href="{{ URL::to('/emailInvoicePDF/' . $info->id) }}">Email Invoice</a></li>
    <li><a href="{{ URL::to('/getContractPDF/' . $info->id) }}">Print Rate Con</a></li>
    <li><a href="{{ URL::to('/emailRateConPDF/' . $info->id) }}">Email Rate Con</a></li>
    <li><a href="{{ URL::to('/status/' . $info->id) }}">Get Status</a></li>
    <li><a href="{{ URL::to('/pod/' . $info->id) }}">POD Request</a></li>
    <li><a href="{{ URL::to('/updateCustomer/' . $info->id) }}">Update Customer</a></li>
    <li><a href="{{ URL::to('/internal/' . $info->id) }}">Email Internal</a></li>
    <li><a href="#">Contact List</a></li>
    <li><a href="#">Email BOL</a></li>
  </ul>
</div>






	  </div> 
    </div> 
  </div> 
</div>  

<div id="accounting">
    <div class="well">
		<div class="form-group">
			<div class="row">
				<div class="col-xs-12">
					<label class="label-control" for="amount_due">Amount Due</label>
                    <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" id="amount_due" name="amount_due" value="{{ $info->amount_due }}">
                    <span class="input-group-addon">.00</span>
                    </div>
				</div>
        <div class="col-xs-12">
					<label class="label-control" for="carrier_rate">Carrier Rate</label>
          <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" id="carrier_rate" name="carrier_rate" value="{{ $info->carrier_rate }}">
                    <span class="input-group-addon">.00</span>
                    </div>
				</div>
				<div class="col-xs-12">
					<label class="label-control" for="total_miles">Signed Rate Con</label>
                    <input type="text" class="form-control" id="total_miles" name="total_miles" value="{{ $info->total_miles }}">
				</div>
				<div class="col-xs-12">
					<label class="label-control" for="rate_con_creation_date">Rate Con Create</label>
                    <input type="text" class="form-control datepicker" id="datepicker5" name="rate_con_creation_date" value="{{ $info->rate_con_creation_date }}">
				</div>
				<div class="col-xs-12">
					<label class="label-control" for="billed_date">Billed Date</label>
                    <input type="text" class="form-control" id="datepicker6" name="billed_date" value="{{ $info->billed_date }}">
				</div>
				<div class="col-xs-12">
					<label class="label-control" for="approved_carrier_invoice">APVD CRR INV</label>
                    <input type="text" class="form-control" id="datepicker7" name="approved_carrier_invoice" value="{{ $info->approved_carrier_invoice }}">
				</div>
        <div class="col-xs-12 text-center" id="submit_button">
          <button type="submit"class="btn btn-success">Update</button>
			 </div>
      </div>
		</div>
	</div>
</div>




<div id="commodity_div">
    <div class="well">
        <label for="commodity">Commodity</label>
        <textarea name="commodity" id="commodity" class="form-control" rows="2">{{ $info->commodity }}</textarea>
    </div>
</div>

<div id="special_ins_div">
    <div class="well">
        <label for="special_ins">Special Instructions (These notes appear on Rate Con Only)</label>
        <textarea name="special_ins" id="special_ins" class="form-control" rows="2">{{ $info->special_ins }}</textarea>
    </div>
</div>

<div id="stops_div">
    <div class="well">
        <label for="add_stops">Additional Stops</label>
        <textarea name="add_stops" id="add_stops" class="form-control" rows="2">{{ $info->add_stops }}</textarea>
    </div>
</div>

<div id="internal_notes_div">
    <div class="well">
        <label for="internal_notes">Internal Notes (These notes are for ITS eyes only)</label>
        <textarea name="internal_notes" id="internal_notes" class="form-control" rows="2">{{ $info->internal_notes }}</textarea>
    </div>
</div>

<div id="invoice_notes_div">
    <div class="well">
        <label for="invoice_notes">Invoice Notes (These notes get attached to the Invoice)</label>
        <textarea name="invoice_notes" id="invoice_notes" class="form-control" rows="2">{{ $info->invoice_notes }}</textarea>
    </div>
</div>

<div id="update_message_section">
    <div class="well">
        <label for="update_customer_message">Sent when "Update Customer" or "Email Internal" are clicked</label>
        <textarea name="update_customer_message" id="update_customer_message" class="form-control" rows="2">{{ $info->update_customer_message }}</textarea>
    </div>
</div>

                  

</form>





<!-- These buttons require data passed through but no PDF attachments needed -->






@endsection