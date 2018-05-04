
@extends('layouts.app')

@section('content')


<div class="page-header">
  <!-- <h2 class="text-center"><a href="{{ url('/home') }}">Back to Home</a></h2> -->
  <h3 class="text-center text-primary">PRO # {{ $info->id }}</h3> 
  <h4 class="text-center text-primary"><i>INVOICE:</i> {{ $info->created_by }} on {{ $info->creation_date }}</h4> 
  @if($info->rate_con_creator !== NULL) <h4 class="text-center text-primary"><i>RATE CON:</i> {{ $info->rate_con_creator }} on {{ $info->rate_con_creation_date }} </h4> @endif
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

  <input type="hidden" id="remit_name" name="remit_name" value="{{ $info->remit_name }}">
  <input type="hidden" id="remit_address" name="remit_address" value="{{ $info->remit_address }}">
  <input type="hidden" id="remit_city" name="remit_city" value="{{ $info->remit_city }}">
  <input type="hidden" id="remit_state" name="remit_state" value="{{ $info->remit_state }}">
  <input type="hidden" id="remit_zip" name="remit_zip" value="{{ $info->remit_zip }}">

  <input type="hidden" id="routing_number" name="routing_number" value="{{ $info->routing_number }}">
  <input type="hidden" id="account_number" name="account_number" value="{{ $info->account_number }}">
  <input type="hidden" id="account_type" name="account_type" value="{{ $info->account_type }}">
  <input type="hidden" id="account_name" name="account_name" value="{{ $info->account_name }}">
  <input type="hidden" id="accounting_email" name="accounting_email" value="{{ $info->accounting_email }}">

  <div id="customer">
    <div class="well">
      <div class="form-group">
        <div class="row">
          <div class="col-xs-12">
            <div class="input-group">
              <input type="text" class="form-control" id="customer-search" placeholder="Customer Search">
              <span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#customerModal" onclick="goToCustomerEditPage()" class="btn btn-secondary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></span>
            </div>
          </div>
          



          <div class="col-xs-12">
            <label class="label-control" for="customer_name">CUSTOMER</label>
            
            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $info->customer_name }}">
            
          </div>




          <div class="col-xs-8">
            <label class="label-control" for="customer_address">Address</label>
            <input type="text" class="form-control" id="customer_address" name="customer_address" value="{{ $info->customer_address }}">
          </div>
          <div class="col-xs-4">
            <label class="label-control" for="customer_id">ID #</label>
            <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{ $info->customer_id }}">
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
            <label for="internal_email_address" class="label-control">Internal Email / Text Recipient</label>
            <select name="internal_email_address" id="internal_email_address" class="form-control"> 
              @if($info->internal_email_address)
            <option value="{{ $info->internal_email_address }}">{{ $info->internal_email_address }}</option>
          @endif
              <option value="Choose">Choose</option>
              <option value="joem@itransys.com">joem@itransys.com</option>
              <option value="mikeb@itransys.com">mikeb@itransys.com</option>
              <option value="mattk@itransys.com">mattk@itransys.com</option>
              <option value="mattc@itransys.com">mattc@itransys.com</option>
              <option value="mikec@itransys.com">mikec@itransys.com</option>
              <option value="ron@itransys.com">ron@itransys.com</option>
              <option value="robert@itransys.com">robert@itransys.com</option>
              <option value="aj@itransys.com">aj@itransys.com</option>
              <option value="luke@itransys.com">luke@itransys.com</option>
              <option value="lianey@itransys.com">lianey@itransys.com</option>
              <option value="jennifer@itransys.com">jennifer@itransys.com</option>
              <option value="molly@itransys.com">molly@itransys.com</option>
              <option value="danielle@itransys.com">danielle@itransys.com</option>
              <option value="ronc@itransys.com">ronc@itransys.com</option>
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
        
        

        <div class="input-group">
          <input type="text" class="form-control" id="carrier-search" placeholder="Carrier Search">
          <span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#carrierModal" onclick="goToCarrierEditPage()" class="btn btn-secondary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></span>
        </div> <!--end input group-->







      </div>
      <div class="col-xs-12">
       <label class="label-control" for="carrier_name">CARRIER</label>
       <div class="input-group">
        <input type="text" class="form-control" id="carrier_name" name="carrier_name" value="{{ $info->carrier_name }}">
        <span class="input-group-btn">
          <button class="btn btn-secondary" id="clear_carrier" type="button"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span></button>
        </span>
      </div>
    </div>
    <div class="col-xs-8">
     <label class="label-control" for="carrier_address">Address</label>
     <input type="text" class="form-control" id="carrier_address" name="carrier_address" value="{{ $info->carrier_address }}">
   </div>
   <div class="col-xs-4">
     <label class="label-control" for="carrier_id">ID #</label>
     <input type="text" class="form-control" id="carrier_id" name="carrier_id" value="{{ $info->carrier_id }}">
   </div>
   <div class="col-xs-6">
     <label class="label-control" for="carrier_city">City</label>
     <input type="text" class="form-control" id="carrier_city" name="carrier_city" value="{{ $info->carrier_city }}">
   </div>
   <div class="col-xs-6">
    <label class="label-control" for="carrier_mc">MC #</label>
    <input type="text" class="form-control" id="carrier_mc" name="carrier_mc" value="{{ $info->carrier_mc }}">
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
  <div class="col-xs-6">
    <label for="trailer_type" class="label-control">Trailer Type</label>
    <select name="trailer_type" id="trailer_type" class="form-control">
     @if($info->trailer_type)
            <option value="{{ $info->trailer_type }}">{{ $info->trailer_type }}</option>
          @endif
     <option value="Choose">Choose</option>
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
 <div class="col-xs-6">
  <label for="trailer_for_search" class="label-control">Database Trailer</label>
  <select name="trailer_for_search" id="trailer_for_search" class="form-control">
    @if($info->trailer_for_search)
            <option value="{{ $info->trailer_for_search }}">{{ $info->trailer_for_search }}</option>
          @endif
            <option value="Choose">Choose</option>
    <option value="Flatbed">Flatbed</option>
    <option value="Stepdeck">Stepdeck</option>
    <option value="Conestoga">Conestoga</option>
    <option value="Hot Shot">Hot Shot</option>
    <option value="Van">Van</option>
    <option value="Power">Power</option>
    <option value="Lowboy">Lowboy</option>
    <option value="Landoll">Landoll</option>
    <option value="Towing">Towing</option>
    <option value="Auto Carrier">Auto Carrier</option>
    <option value="Straight Truck">Straight Truck</option>
    
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
          
          <div class="input-group">
            <input type="text" class="form-control" id="origin-search" placeholder="Origin Search">
            <span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#originModal" onclick="goToOriginEditPage()" class="btn btn-secondary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></span>
          </div>

        </div>
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
            @if($info->pick_time)
            <option value="{{ $info->pick_time }}">{{ $info->pick_time }}</option>
          @endif
            <option value="Choose">Choose</option>
            <option value="0100">0100</option>
            <option value="0200">0200</option>
            <option value="0300">0300</option>
            <option value="0400">0400</option>
            <option value="0500">0500</option>
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
        <div class="col-xs-6">
         <label for="pick_status" class="label-control text-danger">Pick Status</label>
         <select name="pick_status" id="pick_status" class="form-control">
           @if($info->pick_status)
            <option value="{{ $info->pick_status }}">{{ $info->pick_status }}</option>
          @endif
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
          
          <div class="input-group">
            <input type="text" class="form-control" id="delivery-search" placeholder="Delivery Search">
            <span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#destinationModal" onclick="goToDesEditPage()" class="btn btn-secondary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></span>
          </div>

        </div>
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
            
          @if($info->delivery_time)
            <option value="{{ $info->delivery_time }}">{{ $info->delivery_time }}</option>
          @endif
            <option value="Choose">Choose</option>
            <option value="0100">0100</option>
            <option value="0200">0200</option>
            <option value="0300">0300</option>
            <option value="0400">0400</option>
            <option value="0500">0500</option>
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
        <div class="col-xs-6">
          <label for="pick_status" class="label-control text-danger">Del Status</label>
          <select name="delivery_status" id="delivery_status" class="form-control">
            @if($info->delivery_status)
            <option value="{{ $info->delivery_status }}">{{ $info->delivery_status }}</option>
          @endif
            <option value="Open">Open</option>
            <option value="En Route">En Route</option>
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
   <label class="label-control" for="signed_rate_con">Signed Rate Con</label>
   <input type="text" class="form-control" id="signed_rate_con" name="signed_rate_con" value="{{ $info->signed_rate_con }}">
 </div>
 <div class="col-xs-12">
   <label class="label-control" for="datepicker5">Rate Con Create</label>
   <input type="text" class="form-control datepicker" id="datepicker5" name="rate_con_creation_date" value="{{ $info->rate_con_creation_date }}">
 </div>

  <div class="col-xs-12" id="submit_button">
  <button class="btn btn-success form-control" type="submit">Update</button>
</div>


        <!-- $table->string('paid_amount_from_customer')->nullable();
            $table->string('payment_method_from_customer')->nullable();
            $table->string('ref_or_check_num_from_customer')->nullable();
            $table->string('deposit_date')->nullable(); -->
    


    <div class="btn-group" id="action_buttons">
      <button type="button" class="btn btn-primary">Actions</button>
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">EMAILS WITH PDF</li>
        <li><a href="{{ URL::to('/emailRateConPDF/' . $info->id) }}"><b>Email Rate Con</b></a></li>
        <li><a href="{{ URL::to('/emailBOLYou/' . $info->id) }}"><b>Email BOL You</b></a></li>
        <li><a href="{{ URL::to('/emailBOLCarrier/' . $info->id) }}"><b>Email BOL Carrier</b></a></li>
        <li><a href="{{ URL::to('/emailInvoicePDF/' . $info->id) }}"><b>Email Invoice</b></a></li>
        <li class="divider"></li>
        <li class="dropdown-header">PRINT PDF</li>
        <li><a href="{{ URL::to('/getContractPDF/' . $info->id) }}"><b>Print Rate Con</b></a></li>
        <li><a href="{{ URL::to('/getInvoicePDF/' . $info->id) }}"><b>Print Invoice</b></a></li>
        <li class="divider"></li>
        <li class="dropdown-header">AUTO EMAILS</li>
        <li><a href="{{ URL::to('/status/' . $info->id) }}"><b>Get Status</b></a></li>
        <li><a href="{{ URL::to('/pod/' . $info->id) }}"><b>POD Request</b></a></li>
        <li><a href="{{ URL::to('/ur_safety/' . $info->id) }}"><b>No Touch - UR Safety Info</b></a></li>
        <li><a href="{{ URL::to('/ur_safety_help/' . $info->id) }}"><b>Hands Held - UR Safety Info</b></a></li>
        <li class="divider"></li>
        <li class="dropdown-header">EMAILS W/MESSAGE</li>
        <li><a href="{{ URL::to('/internal/' . $info->id) }}"><b>Email Internal</b></a></li>
        <li><a href="{{ URL::to('/emailLoadGroup/' . $info->id) }}"><b>Email Load Group</b></a></li>
        <li><a href="{{ URL::to('/emailBrushJoe/' . $info->id) }}"><b>Email Joe, Brush, RC Creator</b></a></li>
        <li><a href="{{ URL::to('/updateCustomer/' . $info->id) }}"><b>Email Customer</b></a></li>
        <li><a href="{{ URL::to('/emailCarrier/' . $info->id) }}"><b>Email Carrier</b></a></li>
        <li><a href="{{ URL::to('/emailShipper/' . $info->id) }}"><b>Generate Email Shipper/Consignee</b></a></li>
        <li class="divider"></li>
        <li class="dropdown-header">TEXT MESSAGE</li>
        <li><a href="{{ URL::to('/textDriverLoadInfo/' . $info->id) }}"><b>Text Driver Load Info</b></a></li>
        <li><a href="{{ URL::to('/textDriver/' . $info->id) }}"><b>Text Driver Custom Message</b></a></li>
        <li><a href="{{ URL::to('/textDriverPickStatus/' . $info->id) }}"><b>Text Driver For Pick Status</b></a></li>
        <li><a href="{{ URL::to('/textDriverDeliveryStatus/' . $info->id) }}"><b>Text Driver For Delivery Status</b></a></li>
        <li><a href="{{ URL::to('/textLoadInfo/' . $info->id) }}"><b>Text Load To You</b></a></li>
        <li><a href="{{ URL::to('/textAndEmailRollbackInfo/' . $info->id) }}"><b>Rollback Info</b></a></li>
        <li class="divider"></li>
        <li class="dropdown-header">ACCOUNTING</li>
        @if (Auth::user()->accounting)<li><a href="{{ URL::to('/printCheck/' . $info->id) }}"><b>Print Check</b></a></li>@endif

        @if($info->carrier_name == NULL)

        <li class="divider"></li>
        <li class="dropdown-header">DUPLICATE INVOICE</li>
        <li><a onclick="return confirm('YOU ARE DUPLICATING AN INVOICE, ARE YOU SURE?  THIS CANNOT BE UNDONE.')" href="{{ URL::to('/duplicateInvoice/' . $info->id) }}"><b>Duplicate Invoice</b></a></li>
      
        @endif
      
      </ul>
    </div>

  </div> 
</div> 
</div> 
</div>  

@if (Auth::user()->accounting)

<div id="accounting">
  <div class="well">
    <h4 class="text-success"><b><i>CUSTOMER</i></b></h4>
    <div class="form-group">
      <div class="row">
        

        <div class="col-xs-12">
          <label class="label-control text-success" for="paid_amount_from_customer">CUSTOMER PAID</label>
          <div class="input-group">
        <span class="input-group-addon">$</span>
          <input type="text" class="form-control" id="paid_amount_from_customer" name="paid_amount_from_customer" value="{{ $info->paid_amount_from_customer }}">
          <span class="input-group-addon">.00</span>
      </div>
        </div>

        <div class="col-xs-12">
          <label class="label-control text-success" for="totalCheckAmountFromCustomer">TOTAL CHECK AMOUNT</label>
          <div class="input-group">
        <span class="input-group-addon">$</span>
          <input type="text" class="form-control" id="totalCheckAmountFromCustomer" name="totalCheckAmountFromCustomer" value="{{ $info->totalCheckAmountFromCustomer }}">
          <span class="input-group-addon">.00</span>
      </div>
        </div>

        


        <div class="col-xs-12">
          <label class="label-control text-success" for="payment_method_from_customer">PAYMENT METHOD</label>
          <select name="payment_method_from_customer" id="payment_method_from_customer" class="form-control">
            
          @if($info->payment_method_from_customer)
            <option value="{{ $info->payment_method_from_customer }}">{{ $info->payment_method_from_customer }}</option>
          @endif
            <option value="Choose">Choose</option>
            <option value="ACH">ACH</option>
            <option value="CHECK">CHECK</option>
            <option value="CREDIT">CREDIT</option>
            <option value="CASH">CASH</option>
            <option value="WIRE">WIRE</option>
            
          </select>
        </div>

         <div class="col-xs-12">
          <label class="label-control text-success" for="ref_or_check_num_from_customer">REF OR CHECK #</label>
          <input type="text" class="form-control" id="ref_or_check_num_from_customer" name="ref_or_check_num_from_customer" value="{{ $info->ref_or_check_num_from_customer }}">
</div>

        
<div class="col-xs-12">
   <label class="label-control text-success" for="datepicker_deposit_date">DEPOSIT DATE</label>
   <input type="text" class="form-control datepicker" id="datepicker_deposit_date" name="deposit_date" value="{{ $info->deposit_date }}">
 </div>

 <div class="col-xs-12">
   <label class="label-control text-success" for="datepicker6">BILLED DATE</label>
   <input type="text" class="form-control datepicker" id="datepicker6" name="billed_date" value="{{ $info->billed_date }}">
 </div>

  <div class="col-xs-12">
   <label class="radio-inline"><input type="radio" name="customerPayStatus" value="PAID">PAID</label>
   <label class="radio-inline"><input type="radio" name="customerPayStatus" value="OPEN">OPEN</label>
 </div>

 <div class="col-xs-12">
   <p class="text-success">PAY STATUS: {{ $info->customerPayStatus }}</p>
 </div>

         
</div>
</div>
</div>
</div>

@endif

@if (Auth::user()->accounting)

<div id="accounting">
  <div class="well">
    <h4 class="text-primary"><b><i>CARRIER</i></b></h4>
    <div class="form-group">
      <div class="row">
        

         <div class="col-xs-12">
          <label class="label-control text-primary" for="payment_method">PAYMENT METHOD</label>
          <select name="payment_method" id="payment_method" class="form-control">
            
          @if($info->payment_method)
            <option value="{{ $info->payment_method }}">{{ $info->payment_method }}</option>
          @endif
            <option value="Choose">Choose</option>
            <option value="ACH">ACH</option>
            <option value="CHECK">CHECK</option>
            
          </select>
        </div>


        <div class="col-xs-12">
          <label class="label-control text-primary" for="vendor_invoice_number">VENDOR INVOICE #</label>
          <input type="text" class="form-control" id="vendor_invoice_number" name="vendor_invoice_number" value="{{ $info->vendor_invoice_number }}">
        </div>
        <div class="col-xs-12">
          <label class="label-control text-primary" for="vendor_invoice_date">VENDOR DATE</label>
          <input type="text" class="form-control datepicker" id="datepicker3" name="vendor_invoice_date" value="{{ $info->vendor_invoice_date }}">
        </div>


       
 
 
 
 <div class="col-xs-12">
   <label class="label-control text-primary" for="datepicker7">APP CRR INV</label>
   <input type="text" class="form-control datepicker" id="datepicker7" name="approved_carrier_invoice" value="{{ $info->approved_carrier_invoice }}">
 </div>

  <div class="col-xs-12">
   <label class="label-control text-primary" for="vendor_check_number">VENDOR PAYMENT #</label>
   <input type="text" class="form-control" id="vendor_check_number" name="vendor_check_number" value="{{ $info->vendor_check_number }}">
 </div>

 <div class="col-xs-12">
   <label class="radio-inline"><input type="radio" name="carrierPayStatus" value="APPRVD">APPRVD</label>
   <label class="radio-inline"><input type="radio" name="carrierPayStatus" value="OPEN">OPEN</label>
 </div>

 <div class="col-xs-12">
   <p class="text-primary">PAY STATUS: {{ $info->carrierPayStatus }}</p>
 </div>
 <div class="col-xs-12">
   <p class="text-primary">UPLOAD: {{ $info->upload_date }}</p>
 </div>

 
 



 





</div>
</div>
</div>
</div>

@endif

<div class="well" id="commodity_div">
  <div class="col-xs-12">
    
    <div class="input-group">
      <input type="text" class="form-control" id="equipment-search" placeholder="Equipment Search">
      <span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#equipmentModal" onclick="goToEquipmentEditPage()" class="btn btn-secondary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></span>
    </div>
  </div>
  <div class="form-group">
    <label for="commodity">Commodity</label>
    <textarea name="commodity" id="commodity" class="form-control" rows="4">{{ $info->commodity }}</textarea>
  </div>
</div>



<div class="well" id="special_ins_div">
  <div class="form-group">
    <label for="special_ins">Special Instructions (Appear on Rate Con)</label>
    <textarea name="special_ins" id="special_ins" class="form-control" rows="4">{{ $info->special_ins }}</textarea>
  </div>
</div>

<div class="well" id="stops_div">
<div class="col-xs-12">
      <input type="text" class="form-control" id="additional-search" placeholder="Location Search">
</div>
  <div class="form-group">
    <label for="add_stops">Additional Stops</label>
    <textarea name="add_stops" id="add_stops" class="form-control" rows="4">{{ $info->add_stops }}</textarea>
  </div>
</div>
<div class="well" id="invoice_notes_div">
  <div class="form-group">
    <label for="invoice_notes">Invoice Notes (Appear on Invoice)</label>
    <textarea name="invoice_notes" id="invoice_notes" class="form-control" rows="4">{{ $info->invoice_notes }}</textarea>
  </div>
</div>

<div class="well" id="internal_notes_div">
  <div class="form-group">
    <label for="internal_notes">Internal Notes (ITS eyes only)</label>
    <textarea name="internal_notes" id="internal_notes" class="form-control" rows="4">{{ $info->internal_notes }}</textarea>
  </div>
</div>
<div class="well" id="email_internal_section">
  <div class="form-group">
    <label for="internal_message">Email Colleague</label>
    <textarea name="internal_message" id="internal_message" class="form-control" rows="4">{{ $info->internal_message }}</textarea>
  </div>
</div>
<div class="well" id="message_customer_section">
  <div class="form-group">
    <label for="update_customer_message">Email Customer</label>
    <textarea name="update_customer_message" id="update_customer_message" class="form-control" rows="4">{{ $info->update_customer_message }}</textarea>
  </div>
</div>
<div class="well" id="message_carrier_section">
  <div class="form-group">
    <label for="carrier_message">Email/Text Carrier</label>
    <textarea name="carrier_message" id="carrier_message" class="form-control" rows="4">{{ $info->carrier_message }}</textarea>
  </div>
</div>
</form>


<div>
<ul>
@foreach($text_message as $text)
  <li>{{ $text->message . ' Sent At: ' . $text->sentAt . ' From: ' . $text->fromCell }}</li>
@endforeach
</ul>

@if (Auth::user()->accounting)
<ul>
  <li>Remit Name: {{ $info->remit_name }}</li>
  <li>Remit Address: {{ $info->remit_address }}</li>
  <li>Remit City: {{ $info->remit_city }}</li>
  <li>Remit State: {{ $info->remit_state }}</li>
  <li>Remit Zip: {{ $info->remit_zip }}</li>
</ul>

<ul>
  <li>Routing Number: {{ $info->routing_number }}</li>
  <li>Account Number: {{ $info->account_number }}</li>
  <li>Account Name: {{ $info->account_name }}</li>
  <li>Account Type: {{ $info->account_type }}</li>
  <li>Account Email: {{ $info->accounting_email }}</li>
</ul>
@endif
</div>


<div class="container-fluid">
  <!-- <div class="well"> -->
  <table id="mainTable" cellspacing="0" class="stripe row-border order-column" style="border-collapse: collapse; width: 2800px; margin-left: 10px; font-size: 12px; table-layout: fixed; word-wrap:break-word;">

    <thead>
      <tr>
        <th></th>
        <th>Pro</th>
        <th>P Status</th>
        <th>P Date</th>
        <th>PT</th>
        <th>D Status</th>
        <th>D Date</th>
        <th>DT</th>
        <th>Billed</th>
        <th>Ref</th>
        <th>Customer</th>
        <th>Carrier</th>
        <th>P Company</th>
        <th>P City</th>
        <th>D Company</th>
        <th>D City</th>
        <th>PO Num</th>
        <th>BOL</th>
        <th>Commodity</th>
        <th>Rate Con</th>
        <th>Creator</th>
        <th>Group</th>
        <th>I Rate</th>
        <th>C Rate</th>
        <th>Trailer</th>
        <th>Signed</th>
        <th>Created</th>
        <th>Pick ST</th>
        <th>Delivery ST</th>
        <th>Con Creator</th>
        <th>Vendor Inv #</th>
        
        
        
        
        


      </tr>
    </thead>
    <tfoot>
      <tr>
        <th></th>
        <th>Pro</th>
        <th>P Status</th>
        <th>P Date</th>
        <th>PT</th>
        <th>D Status</th>
        <th>D Date</th>
        <th>DT</th>
        <th>Billed</th>
        <th>Ref</th>
        <th>Customer</th>
        <th>Carrier</th>
        <th>P Company</th>
        <th>P City</th>
        <th>D Company</th>
        <th>D City</th>
        <th>PO Num</th>
        <th>BOL</th>
        <th>Commodity</th>
        <th>Rate Con</th>
        <th>Creator</th>
        <th>Group</th>
        <th>I Rate</th>
        <th>C Rate</th>
        <th>Trailer</th>
        <th>Signed</th>
        <th>Created</th>
        <th>Pick ST</th>
        <th>Delivery ST</th>
        <th>Con Creator</th>
        <th>Vendor Inv #</th>
        
        
        
        

      </tr>
    </tfoot>  
  </table>
  <!-- </div> -->
</div>

<!-- MODAL FOR CUSTOMER FORM -->
<div id="customerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Customer Data</h4>
      </div>
      <div class="modal-body">
        <div id="customer_data_modal">
          <div class="well">
            <div class="alert alert-success hidden" id="success-alert-display"></div>
            <input type="hidden" id="customer_id" name="customer_id" value="">
            <div class="form-group">
              <div class="row">
                <div class="col-xs-8">
                  <label class="label-control" for="name">CUSTOMER</label>
                  <input type="text" class="form-control" id="name" name="name" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="location_number">LOCATION #</label>
                  <input type="text" class="form-control" id="location_number" name="location_number" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-9">
                  <label class="label-control" for="address">ADDRESS</label>
                  <input type="text" class="form-control" id="address" name="address" value="">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="fax">FAX</label>
                  <input type="text" class="form-control" id="fax" name="fax" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <label class="label-control" for="city">CITY</label>
                  <input type="text" class="form-control" id="city" name="city" value="">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="state">STATE</label>
                  <input type="text" class="form-control" id="state" name="state" value="">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="zip">ZIP</label>
                  <input type="text" class="form-control" id="zip" name="zip" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-4">
                  <label class="label-control" for="contact">NAME</label>
                  <input type="text" class="form-control" id="contact" name="contact" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="phone">PHONE</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="email">EMAIL</label>
                  <input type="text" class="form-control" id="email" name="email" value="">
                </div>
              </div>
              
              <div class="row">
                <div class="col-xs-12">
                  <label class="label-control" for="cus_internal_notes">INTERNAL NOTES</label>
                  <textarea name="cus_internal_notes" id="cus_internal_notes" class="form-control" rows="2"></textarea>
                </div>
              </div>
              <button type="button" id="editCustomer" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Update</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL FOR ORIGIN FORM -->
<div id="originModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Origin Data</h4>
      </div>
      <div class="modal-body">

        <div id="location_data_modal">
          <div class="well">
            <div class="alert alert-success hidden" id="success-alert-display"></div>
            
            
            <div class="form-group">
              <input type="hidden" id="location_id" name="location_id" value="">
              <div class="row">
                <div class="alert alert-success hidden" id="success-alert-origin"></div>
                <div class="col-xs-8">
                  <label class="label-control" for="location_name">NAME</label>
                  <input type="text" class="form-control" id="location_name" name="location_name" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="origin_location_number">LOCATION #</label>
                  <input type="text" class="form-control" id="origin_location_number" name="origin_location_number" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <label class="label-control" for="location_address">ADDRESS</label>
                  <input type="text" class="form-control" id="location_address" name="location_address" value="">
                </div>
                
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <label class="label-control" for="location_city">CITY</label>
                  <input type="text" class="form-control" id="location_city" name="location_city" value="">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="location_state">STATE</label>
                  <input type="text" class="form-control" id="location_state" name="location_state" value="">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="location_zip">ZIP</label>
                  <input type="text" class="form-control" id="location_zip" name="location_zip" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <label class="label-control" for="location_contact">CONTACT</label>
                  <input type="text" class="form-control" id="location_contact" name="location_contact" value="">
                </div>
                <div class="col-xs-6">
                  <label class="label-control" for="location_phone">PHONE</label>
                  <input type="text" class="form-control" id="location_phone" name="location_phone" value="">
                </div>
                
              </div>

              <div class="row">
                <div class="col-xs-4">
                  <label class="label-control" for="location_email">EMAIL</label>
                  <input type="text" class="form-control" id="location_email" name="location_email" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="location_cell">CELL</label>
                  <input type="text" class="form-control" id="location_cell" name="location_cell" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <label class="label-control" for="location_notes">LOCATION NOTES</label>
                  <textarea name="location_notes" id="location_notes" class="form-control" rows="2"></textarea>
                </div>
                
              </div>

              <button type="button" id="editLocation" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Update</button>

            </div>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL FOR DELIVERY FORM -->
<div id="destinationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delivery Data</h4>
      </div>
      <div class="modal-body">

        <div id="dest_data_modal">
          <div class="well">
            <div class="alert alert-success hidden" id="success-alert-dest"></div>
            
            
            <div class="form-group">
              <input type="hidden" id="dest_id" name="dest_id" value="">
              <div class="row">
                <div class="col-xs-8">
                  <label class="label-control" for="dest_name">NAME</label>
                  <input type="text" class="form-control" id="dest_name" name="dest_name" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="dest_number">LOCATION #</label>
                  <input type="text" class="form-control" id="dest_number" name="dest_number" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <label class="label-control" for="dest_address">ADDRESS</label>
                  <input type="text" class="form-control" id="dest_address" name="dest_address" value="">
                </div>
                
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <label class="label-control" for="dest_city">CITY</label>
                  <input type="text" class="form-control" id="dest_city" name="dest_city" value="">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="dest_state">STATE</label>
                  <input type="text" class="form-control" id="dest_state" name="dest_state" value="">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="dest_zip">ZIP</label>
                  <input type="text" class="form-control" id="dest_zip" name="dest_zip" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <label class="label-control" for="dest_contact">CONTACT</label>
                  <input type="text" class="form-control" id="dest_contact" name="dest_contact" value="">
                </div>
                <div class="col-xs-6">
                  <label class="label-control" for="dest_phone">PHONE</label>
                  <input type="text" class="form-control" id="dest_phone" name="dest_phone" value="">
                </div>
                
              </div>

              <div class="row">
                <div class="col-xs-4">
                  <label class="label-control" for="dest_email">EMAIL</label>
                  <input type="text" class="form-control" id="dest_email" name="dest_email" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="dest_cell">CELL</label>
                  <input type="text" class="form-control" id="dest_cell" name="dest_cell" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <label class="label-control" for="dest_notes">LOCATION NOTES</label>
                  <textarea name="dest_notes" id="dest_notes" class="form-control" rows="2"></textarea>
                </div>
                
              </div>

              <button type="button" id="editDest" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Update</button>

            </div>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL FOR EQUIPMENT FORM -->
<div id="equipmentModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Equipment Data</h4>
      </div>
      <div class="modal-body">

        <div id="equip_data_modal">
          <div class="well">
            <div class="alert alert-success hidden" id="success-alert-equip"></div>
            
            <div class="form-group">
              <div class="row">
               <input type="hidden" id="equip_id" name="equip_id" value="">

               <div class="col-xs-6">
                <label class="label-control" for="equip_make">MAKE</label>
                <input type="text" class="form-control" id="equip_make" name="equip_make" value="">
              </div>
              <div class="col-xs-6">
                <label class="label-control" for="equip_model">MODEL</label>
                <input type="text" class="form-control" id="equip_model" name="equip_model" value="">
              </div>
            </div>
            
            <div class="row">
              <div class="col-xs-3">
                <label class="label-control" for="equip_length">LENGTH</label>
                <input type="text" class="form-control" id="equip_length" name="equip_length" value="">
              </div>
              <div class="col-xs-3">
                <label class="label-control" for="equip_width">WIDTH</label>
                <input type="text" class="form-control" id="equip_width" name="equip_width" value="">
              </div>
              <div class="col-xs-3">
                <label class="label-control" for="equip_height">HEIGHT</label>
                <input type="text" class="form-control" id="equip_height" name="equip_height" value="">
              </div>
              <div class="col-xs-3">
                <label class="label-control" for="equip_weight">WEIGHT</label>
                <input type="text" class="form-control" id="equip_weight" name="equip_weight" value="">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <label class="label-control" for="equip_commodity">COMMODITY</label>
                <input type="text" class="form-control" id="equip_commodity" name="equip_commodity" value="">
              </div>
              
              
            </div>

            


            <div class="row">
              
              <div class="col-xs-12">
                <label class="label-control" for="equip_loading_instructions">LOADING INSTRUCTIONS</label>
                <textarea name="equip_loading_instructions" id="equip_loading_instructions" class="form-control" rows="2"></textarea>
              </div>
              
            </div>
            

            <button type="button" id="editEquip" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Update</button>

          </div>
        </div>
      </div>
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>

<!-- MODAL FOR CARRIER FORM -->
<div id="carrierModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Carrier Data</h4>
      </div>
      <div class="modal-body">

        <div id="carrier_data_modal">
          <div class="well">
            <div class="alert alert-success hidden" id="success-alert-carrier"></div>
            
            <div class="form-group">
              <div class="row">
                <input type="hidden" id="car_id" name="car_id" value="">
                <div class="col-xs-6">
                  <label class="label-control" for="car_company">COMPANY</label>
                  <input type="text" class="form-control" id="car_company" name="car_company" value="">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="car_mc_number">MC #</label>
                  <input type="text" class="form-control" id="car_mc_number" name="car_mc_number" value="">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="car_dot_number">DOT #</label>
                  <input type="text" class="form-control" id="car_dot_number" name="car_dot_number" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-9">
                  <label class="label-control" for="car_address">ADDRESS</label>
                  <input type="text" class="form-control" id="car_address" name="car_address" value="">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="car_contact">CONTACT</label>
                  <input type="text" class="form-control" id="car_contact" name="car_contact" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <label class="label-control" for="car_city">CITY</label>
                  <input type="text" class="form-control" id="car_city" name="car_city" value="">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="car_state">STATE</label>
                  <input type="text" class="form-control" id="car_state" name="car_state" value="">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="car_zip">ZIP</label>
                  <input type="text" class="form-control" id="car_zip" name="car_zip" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-4">
                  <label class="label-control" for="car_phone">PHONE</label>
                  <input type="text" class="form-control" id="car_phone" name="car_phone" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_fax">FAX</label>
                  <input type="text" class="form-control" id="car_fax" name="car_fax" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_email">EMAIL</label>
                  <input type="text" class="form-control" id="car_email" name="car_email" value="">
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6">
                  <label class="label-control" for="car_driver_name">DRIVER NAME</label>
                  <input type="text" class="form-control" id="car_driver_name" name="car_driver_name" value="">
                </div>
                <div class="col-xs-6">
                  <label class="label-control" for="car_driver_phone">DRIVER PHONE</label>
                  <input type="text" class="form-control" id="car_driver_phone" name="car_driver_phone" value="">
                </div>
                
              </div>

              <div class="row">
                <div class="col-xs-4">
                  <label class="label-control" for="car_cargo_exp">CARGO EXP.</label>
                  <input type="text" class="form-control" id="car_cargo_exp" name="car_cargo_exp" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_cargo_amount">CARGO AMOUNT</label>
                  <input type="text" class="form-control" id="car_cargo_amount" name="car_cargo_amount" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_bc_contract">BC CONTRACT</label>
                  <input type="text" class="form-control" id="car_bc_contract" name="car_bc_contract" value="">
                </div>
              </div>

              <div class="row">
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="flatbed" id="flatbed">Flatbeds</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="stepdeck" id="stepdeck">Stepdecks</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="conestoga" id="conestoga">Conestogas</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="hot_shot" id="hot_shot">Hot Shots</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="van" id="van">Vans</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="power" id="power">Power Only</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="lowboy" id="lowboy">Lowboys</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="landoll" id="landoll">Landoll</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="towing" id="towing">Towing</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="auto_carrier" id="auto_carrier">Auto Carrier</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="straight_truck" id="straight_truck">Straight Trucks</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-4">
                  <label class="label-control" for="car_remit_name">REMIT NAME</label>
                  <input type="text" class="form-control" id="car_remit_name" name="car_remit_name" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_remit_address">REMIT ADDRESS</label>
                  <input type="text" class="form-control" id="car_remit_address" name="car_remit_address" value="">
                </div>
              </div>

              <div class="row">
                <div class="col-xs-4">
                  <label class="label-control" for="car_remit_city">REMIT CITY</label>
                  <input type="text" class="form-control" id="car_remit_city" name="car_remit_city" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_remit_state">REMIT STATE</label>
                  <input type="text" class="form-control" id="car_remit_state" name="car_remit_state" value="">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_remit_zip">ZIP</label>
                  <input type="text" class="form-control" id="car_remit_zip" name="car_remit_zip" value="">
                </div>
              </div>

              <div class="row">
                
                <div class="col-xs-12">
                  <label class="label-control" for="car_permanent_notes">PERMANENT NOTES</label>
                  <textarea name="car_permanent_notes" id="car_permanent_notes" class="form-control" rows="2"></textarea>
                </div>
                
              </div>

              <div class="row">
                
                <div class="col-xs-12">
                  <label class="label-control" for="car_load_info">LOAD INFORMATION</label>
                  <ul>
                  <li>Load route</li>
                  <li>Carrier rate</li>
                  <li>Detailed trailer type and condition</li>
                  <li>Miles from current drop-off and/or miles from our pick</li>
                  <li>Driver's plans for delivery (other drops, out of hours, etc)</li>
                  <li>Delivery date and time</li>
                  </ul>
                  <textarea name="car_internal_notes" id="car_load_info" class="form-control" rows="2"></textarea>
                </div>
                
              </div>

              <div class="row">
              <div class="col-xs-12">
            <label for="email_colleague_carrier" class="label-control">Colleague Email Recipient</label>
            <select name="email_colleague_carrier" id="email_colleague_carrier" class="form-control"> 
              <option value="{{ $info->email_colleague_carrier }}">{{ $info->email_colleague_carrier }}</option>
              <option value="Please Choose One">Please Choose One</option>
              <option value="joem@itransys.com">joem@itransys.com</option>
              <option value="mikeb@itransys.com">mikeb@itransys.com</option>
              <option value="mattk@itransys.com">mattk@itransys.com</option>
              <option value="mattc@itransys.com">mattc@itransys.com</option>
              <option value="mikec@itransys.com">mikec@itransys.com</option>
              <option value="ron@itransys.com">ron@itransys.com</option>
              <option value="robert@itransys.com">robert@itransys.com</option>
              <option value="aj@itransys.com">aj@itransys.com</option>
              <option value="lianey@itransys.com">lianey@itransys.com</option>
              <option value="jennifer@itransys.com">jennifer@itransys.com</option>
              <option value="molly@itransys.com">molly@itransys.com</option>
              <option value="wanda@itransys.com">wanda@itransys.com</option>
            </select>
          </div>
          </div>

              <div class="btn-group" id="carrier_action_buttons" role="group" aria-label="carrier">
              
              <button type="button" id="editCarrier" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Update</button>

              <button type="button" id="getInsurance" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Insurance</button>

              <button type="button" id="getPacket" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Send Packet</button>

              <button type="button" id="sendCarrierInfo" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Email Colleague</button>
              
              </div>


  
              

              
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  </div>





  @endsection