@extends('layouts.app')

@section('content')


@if (session('status'))
    <div class="alert alert-success alert-dismissible">
        
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session('status') }}</strong> Click the X at the far right to close this notification.
    </div>
@endif

<form role="form" class="form-horizontal" method="POST" action="/newCarrier">
        
        {{ csrf_field() }}


    <div id="customer_data">
    <div class="well">
      
      
      <div class="form-group">
        <div class="row">
            <div class="col-xs-8">
                <label class="label-control" for="name">COMPANY</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="location_number">DOT/MC #</label>
                <input type="text" class="form-control" id="location_number" name="location_number" value="{{ old('location_number') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-9">
                <label class="label-control" for="address">ADDRESS</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="fax">CONTACT</label>
                <input type="text" class="form-control" id="fax" name="fax" value="{{ old('fax') }}">
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
                <label class="label-control" for="name_1">PHONE</label>
                <input type="text" class="form-control" id="name_1" name="name_1" value="{{ old('name_1') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="phone_1">FAX</label>
                <input type="text" class="form-control" id="phone_1" name="phone_1" value="{{ old('phone_1') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="email_1">EMAIL</label>
                <input type="text" class="form-control" id="email_1" name="email_1" value="{{ old('email_1') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <label class="label-control" for="name_2">DRIVER NAME</label>
                <input type="text" class="form-control" id="name_2" name="name_2" value="{{ old('name_2') }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="phone_2">DRIVER PHONE</label>
                <input type="text" class="form-control" id="phone_2" name="phone_2" value="{{ old('phone_2') }}">
            </div>
            
        </div>

        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="name_3">CARGO EXP.</label>
                <input type="text" class="form-control" id="name_3" name="name_3" value="{{ old('name_3') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="phone_3">CARGO AMOUNT</label>
                <input type="text" class="form-control" id="phone_3" name="phone_3" value="{{ old('phone_3') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="email_3">BC CONTRACT</label>
                <input type="text" class="form-control" id="email_3" name="email_3" value="{{ old('email_3') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="name_4">REMIT NAME</label>
                <input type="text" class="form-control" id="name_4" name="name_4" value="{{ old('name_4') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="phone_4">REMIT ADDRESS</label>
                <input type="text" class="form-control" id="phone_4" name="phone_4" value="{{ old('phone_4') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="name_4">REMIT CITY</label>
                <input type="text" class="form-control" id="name_4" name="name_4" value="{{ old('name_4') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="phone_4">REMIT STATE</label>
                <input type="text" class="form-control" id="phone_4" name="phone_4" value="{{ old('phone_4') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="email_4">ZIP</label>
                <input type="text" class="form-control" id="email_4" name="email_4" value="{{ old('email_4') }}">
            </div>
        </div>

        <div class="row">
		
		    <div class="col-xs-12">
		        <label class="label-control" for="internal_notes">PERMANENT NOTES</label>
		        <textarea name="internal_notes" id="internal_notes" class="form-control" rows="2"></textarea>
		    </div>
		
		</div>

		<div class="row">
		
		    <div class="col-xs-12">
		        <label class="label-control" for="internal_notes">LOAD INFORMATION</label>
		        <textarea name="internal_notes" id="internal_notes" class="form-control" rows="2">{{ old('internal_notes') }}</textarea>
		    </div>
		
		</div>

		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> NEW</button>

		</div>
		</div>
		</div>






            




</form>



@endsection