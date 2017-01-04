@extends('layouts.app')

@section('content')

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

<form role="form" class="form-horizontal" method="POST" action="/newCarrier">
        
        {{ csrf_field() }}


    <div id="carrier_data">
    <div class="well">
      
      <h1 class="text-center">New Carrier</h1> 
      <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="label-control" for="company">COMPANY</label>
                <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="mc_number">MC #</label>
                <input type="text" class="form-control" id="mc_number" name="mc_number" value="{{ old('mc_number') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="dot_number">DOT #</label>
                <input type="text" class="form-control" id="dot_number" name="dot_number" value="{{ old('dot_number') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-9">
                <label class="label-control" for="address">ADDRESS</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="contact">CONTACT</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <label class="label-control" for="city">CITY</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="state">STATE</label>
                <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="zip">ZIP</label>
                <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="phone">PHONE</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="fax">FAX</label>
                <input type="text" class="form-control" id="fax" name="fax" value="{{ old('fax') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="email">EMAIL</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <label class="label-control" for="driver_name">DRIVER NAME</label>
                <input type="text" class="form-control" id="driver_name" name="driver_name" value="{{ old('driver_name') }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="driver_phone">DRIVER PHONE</label>
                <input type="text" class="form-control" id="driver_phone" name="driver_phone" value="{{ old('driver_phone') }}">
            </div>
            
        </div>

        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="cargo_exp">CARGO EXP.</label>
                <input type="text" class="form-control" id="cargo_exp" name="cargo_exp" value="{{ old('cargo_exp') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="cargo_amount">CARGO AMOUNT</label>
                <input type="text" class="form-control" id="cargo_amount" name="cargo_amount" value="{{ old('cargo_amount') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="bc_contract">BC CONTRACT</label>
                <input type="text" class="form-control" id="bc_contract" name="bc_contract" value="{{ old('bc_contract') }}">
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
                <label class="label-control" for="remit_name">REMIT NAME</label>
                <input type="text" class="form-control" id="remit_name" name="remit_name" value="{{ old('remit_name') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="remit_address">REMIT ADDRESS</label>
                <input type="text" class="form-control" id="remit_address" name="remit_address" value="{{ old('remit_address') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="remit_city">REMIT CITY</label>
                <input type="text" class="form-control" id="remit_city" name="remit_city" value="{{ old('remit_city') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="remit_state">REMIT STATE</label>
                <input type="text" class="form-control" id="remit_state" name="remit_state" value="{{ old('remit_state') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="remit_zip">ZIP</label>
                <input type="text" class="form-control" id="remit_zip" name="remit_zip" value="{{ old('remit_zip') }}">
            </div>
        </div>

        <div class="row">
		
		    <div class="col-xs-12">
		        <label class="label-control" for="permanent_notes">PERMANENT NOTES</label>
		        <textarea name="permanent_notes" id="permanent_notes" class="form-control" rows="2">{{ old('permanent_notes') }}</textarea>
		    </div>
		
		</div>

		<div class="row">
		
		    <div class="col-xs-12">
		        <label class="label-control" for="load_info">LOAD INFORMATION</label>
		        <ul>
		            <li>Load route</li>
                	<li>Carrier rate</li>
                	<li>Detailed trailer type and condition</li>
                	<li>Miles from current drop-off and/or miles from our pick</li>
                	<li>Driver's plans for delivery (other drops, out of hours, etc)</li>
                	<li>Delivery date and time</li>
                	</ul>
		        <textarea name="load_info" id="load_info" class="form-control" rows="2">{{ old('load_info') }}</textarea>
		    </div>
		
		</div>

		<button type="submit" class="btn btn-primary" id="newCarrierSubmit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> NEW</button>

		</div>
		</div>
		</div>






            




</form>



@endsection