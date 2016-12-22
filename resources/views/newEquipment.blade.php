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
      
      <h1 class="text-center">New Equipment</h1> 
      <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="label-control" for="make">MAKE</label>
                <input type="text" class="form-control" id="make" name="make" value="{{ old('make') }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="model">MODEL</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}">
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
            <div class="col-xs-12">
                <label class="label-control" for="commodity">COMMODITY</label>
                <input type="text" class="form-control" id="commodity" name="commodity" value="{{ old('commodity') }}">
            </div>
            
            
        </div>

       


        <div class="row">
		
		    <div class="col-xs-12">
		        <label class="label-control" for="loading_instructions">LOADING INSTRUCTIONS</label>
		        <textarea name="loading_instructions" id="loading_instructions" class="form-control" rows="2">{{ old('loading_instructions') }}</textarea>
		    </div>
		
		</div>

		<button type="submit" class="btn btn-primary" id="newEquipmentSubmit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> NEW</button>

		</div>
		</div>
		</div>






            




</form>



@endsection