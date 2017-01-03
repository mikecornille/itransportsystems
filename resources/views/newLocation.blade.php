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

<form role="form" class="form-horizontal" method="POST" action="/newLocation">
        
        {{ csrf_field() }}


    <div id="location_data">
    <div class="well">
      
      <h1 class="text-center">New Location</h1> 
      <div class="form-group">
        <div class="row">
            <div class="col-xs-8">
                <label class="label-control" for="location_name">NAME</label>
                <input type="text" class="form-control" id="location_name" name="location_name" value="{{ old('location_name') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="location_number">LOCATION #</label>
                <input type="text" class="form-control" id="location_number" name="location_number" value="{{ old('location_number') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="label-control" for="address">ADDRESS</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
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
            <div class="col-xs-6">
                <label class="label-control" for="contact">CONTACT</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact') }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="phone">PHONE</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            </div>
            
        </div>

        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="email">EMAIL</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="cell">CELL</label>
                <input type="text" class="form-control" id="cell" name="cell" value="{{ old('cell') }}">
            </div>
        </div>
		<div class="row">
			<div class="col-xs-12">
		        <label class="label-control" for="location_notes">LOCATION NOTES</label>
		        <textarea name="location_notes" id="location_notes" class="form-control" rows="2">{{ old('location_notes') }}</textarea>
		    </div>
		
		</div>

		<button type="submit" class="btn btn-primary" id="newLocationSubmit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> NEW</button>

		</div>
		</div>
		</div>






            




</form>



@endsection