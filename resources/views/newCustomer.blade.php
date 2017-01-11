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

<form role="form" class="form-horizontal" method="POST" action="/newCustomer">
        
        {{ csrf_field() }}


    <div id="customer_data">
    <div class="well">
      
      <h1 class="text-center">New Customer</h1> 
      <div class="form-group">
        <div class="row">
            <div class="col-xs-8">
                <label class="label-control" for="name">CUSTOMER</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="location_number">LOCATION #</label>
                <input type="text" class="form-control" id="location_number" name="location_number" value="{{ old('location_number') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-9">
                <label class="label-control" for="address">ADDRESS</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="fax">FAX</label>
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
                <label class="label-control" for="contact">NAME</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="phone">PHONE</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="email">EMAIL</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
        </div>

        

        <div class="row">
		
		    <div class="col-xs-12">
		        <label class="label-control" for="internal_notes">INTERNAL NOTES</label>
		        <textarea name="internal_notes" id="internal_notes" class="form-control" rows="2">{{ old('internal_notes') }}</textarea>
		    </div>
		
		</div>

          <div class="row">
              <div class="col-xs-12">
            <label for="customer_ambassador" class="label-control">CUSTOMER AMBASSADOR</label>
            <select name="customer_ambassador" id="customer_ambassador" class="form-control"> 
              <option value="Open">Open</option>
              <option value="ronc@itransys.com">ronc@itransys.com</option>
              <option value="joem@itransys.com">joem@itransys.com</option>
              <option value="mikec@itransys.com">mikec@itransys.com</option>
              <option value="mikeb@itransys.com">mikeb@itransys.com</option>
              <option value="mattk@itransys.com">mattk@itransys.com</option>
              <option value="mattc@itransys.com">mattc@itransys.com</option>
              <option value="robert@itransys.com">robert@itransys.com</option>
              <option value="aj@itransys.com">aj@itransys.com</option>
              <option value="wanda@itransys.com">wanda@itransys.com</option>
            </select>
          </div>
          </div>

		<button type="submit" class="btn btn-primary" id="newCustomerSubmit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> NEW</button>

		</div>
		</div>
		</div>






            




</form>




@endsection