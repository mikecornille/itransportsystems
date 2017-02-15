@extends('layouts.app')

@section('content')

<div class="container">

@if (session('status'))
    <div class="alert alert-success alert-dismissible">
        
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session('status') }}</strong> Click the X at the far right to close this notification.
    </div>
@endif

<form role="form" class="form-horizontal" method="POST" action="/searchLoadlist">
        
        {{ csrf_field() }}


    <div id="location_data">
    <div class="well">
      
      <h1 class="text-center">Search Load List</h1> 
      <div class="form-group">
        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="customer_search">CUSTOMER</label>
                <input type="text" class="form-control" id="customer_search" name="customer" value="{{ old('customer') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="commodity">COMMODITY</label>
                <input type="text" class="form-control" id="commodity" name="commodity" value="{{ old('commodity') }}">
            </div>
            <div class="col-xs-2">
                 <label class="label-control" for="urgency">URGENCY</label>
                	<select name="urgency" id="urgency" class="form-control">
                		<option></option>
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
            <div class="col-xs-2">
                <label class="label-control" for="datepicker_search_loadlist">PICK DATE</label>
                <input type="text" class="form-control" id="datepicker_search_loadlist" name="pick_date">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="pick_city">PICK CITY</label>
                <input type="text" class="form-control" id="pick_city" name="pick_city" value="{{ old('pick_city') }}">
            </div>
            <div class="col-xs-2">
                <label class="label-control" for="pick_state">STATE</label>
                <input type="text" class="form-control" id="pick_state" name="pick_state" value="{{ old('pick_state') }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="delivery_city">DELIVERY CITY</label>
                <input type="text" class="form-control" id="delivery_city" name="delivery_city" value="{{ old('delivery_city') }}">
            </div>
            <div class="col-xs-2">
                <label class="label-control" for="delivery_state">STATE</label>
                <input type="text" class="form-control" id="delivery_state" name="delivery_state" value="{{ old('delivery_state') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="created_by">CREATED BY</label>
                <input type="text" class="form-control" id="created_by" name="created_by" value="{{ old('created_by') }}">
            </div>
        </div>
        

		<button type="submit" class="btn btn-primary" id="newLocationSubmit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> SEARCH</button>

		</div>
		</div>
		</div>






            




</form>

@if($open_loads === NULL)

@else

 <dl style="font-weight:normal;">
  @foreach($open_loads as $load)
  <dt style="font-weight:normal;"><b>{{ $load->pick_city . ', ' . $load->pick_state . ' to ' . $load->delivery_city . ', ' . $load->delivery_state . ' (' . $load->miles . 'm) ' . $load->urgency . ' ' . $load->trailer_type }} <a href="#"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></a> {{ date("m/d", strtotime($load->pick_date)) . ' ' . (date("g:ia", strtotime($load->pick_time))) }} <a href="#"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span></a> {{ date("m/d", strtotime($load->delivery_date)) . ' ' . (date("g:ia", strtotime($load->delivery_time))) . ' - ' . $load->special_instructions }}</b></dt>
<dd><b>COMMODITY:</b> {{ $load->load_type . ' LOAD - ' . $load->commodity }} - {{ $load->length . 'ft x ' . $load->width . 'ft x ' . $load->height . 'ft ' . $load->weight . 'lbs' }}</dd>
  <dd><b>OFFERING: ${{ $load->offer_money }}</b> BILLING: ${{ $load->billing_money }} POSTED: ${{ $load->post_money }}</dd>
  <dd><a href="{{ URL::to('/editLoadlist/' . $load->id) }}" title="edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> | <a href="#" title="{{ $load->created_by }}" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $load->customer . ' ' . (date("m/d g:ia", strtotime($load->created_at))) }}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a> | <a href="{{ URL::to('/duplicateLoadlist/' . $load->id) }}" title="duplicate"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></a> | <a href="#" data-toggle="modal" data-target="#noteModal" title="make note"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a> | <a href="{{ URL::to('/newDateLoadlist/' . $load->id) }}" title="post next day"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a> | <a href="{{ URL::to('/emailTruckOffer/' . $load->id) }}" title="email truck template"><span class="glyphicon glyphicon-road" aria-hidden="true"></span></a> | <a href="{{ URL::to('/deleteLoadlist/' . $load->id) }}" title="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></dd>
  <br>
  @endforeach
</dl>

@endif

</div>


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
				<input type="hidden" id="time_name_stamp" name="time_name_stamp" value="{{ date('m/d/Y g:ia') . ' ' . \Auth::user()->name }} -">
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