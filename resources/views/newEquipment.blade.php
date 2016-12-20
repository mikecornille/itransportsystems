@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success alert-dismissible">
        
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session('status') }}</strong> Click the X at the far right to close this notification.
    </div>
@endif

<form role="form" class="form-horizontal" method="POST" action="/newEquipment">
        
        {{ csrf_field() }}


    <div id="equipment_data">
    <div class="well">
      
      
      <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="label-control" for="name">MAKE</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="location_number">MODEL</label>
                <input type="text" class="form-control" id="location_number" name="location_number" value="{{ old('location_number') }}">
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-3">
                <label class="label-control" for="city">LENGTH</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="state">WIDTH</label>
                <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="zip">HEIGHT</label>
                <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="zip">WEIGHT</label>
                <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="label-control" for="name_1">COMMODITY</label>
                <input type="text" class="form-control" id="name_1" name="name_1" value="{{ old('name_1') }}">
            </div>
            
            
        </div>

       


        <div class="row">
		
		    <div class="col-xs-12">
		        <label class="label-control" for="internal_notes">LOADING INSTRUCTIONS</label>
		        <textarea name="internal_notes" id="internal_notes" class="form-control" rows="2">{{ old('internal_notes') }}</textarea>
		    </div>
		
		</div>

		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> NEW</button>

		</div>
		</div>
		</div>






            




</form>



@endsection