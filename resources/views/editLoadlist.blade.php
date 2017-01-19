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

<form role="form" class="form-horizontal" method="POST" action="/editLoadlist/{{ $loadlist->id }}">
        
        {{ method_field('PATCH') }}

        {{ csrf_field() }}


    <div id="loadlist_div">
    
      <div class="form-group">
      <input type="hidden" id="id" name="id" value="{{ $loadlist->id }}">
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
        </div>
        <div class="row">
            <div class="col-xs-3">
                <label class="label-control" for="customer_id">CUSTOMER</label>
                <input type="text" class="form-control" id="customer_id" name="customer" value="{{ $loadlist->customer }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="urgency">URGENCY</label>
                    <select name="urgency" id="urgency" class="form-control">
                        <option value="{{ $loadlist->urgency }}">{{ $loadlist->urgency }}</option>
                        <option value="QUOTE">QUOTE</option>
                        <option value="OPEN">OPEN</option>
                        <option value="CALLER">CALLER</option>
                        <option value="BOOKED">BOOKED</option>
                        <option value="GET NUMBERS">GET NUMBERS</option>
                        <option value="HOLD">HOLD</option>
                    </select>
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="load_type">LOAD TYPE</label>
                <select name="load_type" id="load_type" class="form-control">
                    <option value="{{ $loadlist->load_type }}">{{ $loadlist->load_type }}</option>
                    <option value="FULL">FULL</option>
                    <option value="PARTIAL">PARTIAL</option>
                </select>
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="trailer_type">TRAILER TYPE</label>
                <select name="trailer_type" id="trailer_type" class="form-control">
                    <option value="{{ $loadlist->trailer_type }}">{{ $loadlist->trailer_type }}</option>
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
                <input type="text" class="form-control" id="pick_city" name="pick_city" value="{{ $loadlist->pick_city }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="pick_state">STATE</label>
                <input type="text" class="form-control" id="pick_state" name="pick_state" value="{{ $loadlist->pick_state }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="datepicker_pick_loadlist">DATE</label>
                <input type="text" class="form-control" id="datepicker_pick_loadlist" name="pick_date" value="{{ $loadlist->pick_date }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="pick_time">TIME</label>
                <select name="pick_time" id="pick_time" class="form-control">
                    <option value="{{ $loadlist->pick_time }}">{{ $loadlist->pick_time }}</option>
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
                <input type="text" class="form-control" id="delivery_city" name="delivery_city" value="{{ $loadlist->delivery_city }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="delivery_state">STATE</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="delivery_state" name="delivery_state" value="{{ $loadlist->delivery_state }}">
                            <span class="input-group-btn">
                                <button class="btn btn-success" id="loadlist_map" type="button">MAP</button>
                            </span>
                    </div>           
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="datepicker_delivery_loadlist">DATE</label>
                <input type="text" class="form-control" id="datepicker_delivery_loadlist" name="delivery_date" value="{{ $loadlist->delivery_date }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="delivery_time">TIME</label>
                <select name="delivery_time" id="delivery_time" class="form-control">
                        <option value="{{ $loadlist->delivery_time }}">{{ $loadlist->delivery_time }}</option>
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
                <input type="text" class="form-control" id="commodity" name="commodity" value="{{ $loadlist->commodity }}">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="special_instructions">SPECIAL INSTRUCTIONS</label>
                <input type="text" class="form-control" id="special_instructions" name="special_instructions" value="{{ $loadlist->special_instructions }}">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-3">
                <label class="label-control" for="length">LENGTH</label>
                <input type="text" class="form-control" id="length" name="length" value="{{ $loadlist->length }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="width">WIDTH</label>
                <input type="text" class="form-control" id="width" name="width" value="{{ $loadlist->width }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="height">HEIGHT</label>
                <input type="text" class="form-control" id="height" name="height" value="{{ $loadlist->height }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="weight">WEIGHT</label>
                <input type="text" class="form-control" id="weight" name="weight" value="{{ $loadlist->weight }}">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-3">
                <label class="label-control" for="miles">MILES</label>
                <input type="text" class="form-control" id="miles" name="miles" value="{{ $loadlist->miles }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="billing_money">BILLING MONEY</label>
                <input type="text" class="form-control" id="billing_money" name="billing_money" value="{{ $loadlist->billing_money }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="offer_money">OFFER MONEY</label>
                <input type="text" class="form-control" id="offer_money" name="offer_money" value="{{ $loadlist->offer_money }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="post_money">POST MONEY</label>
                <input type="text" class="form-control" id="post_money" name="post_money" value="{{ $loadlist->post_money }}">
            </div>
        </div>
        
        
          <button type="submit" class="btn btn-primary" id="newCustomerSubmit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> UPDATE</button>
          
          

        

        </div>
        
        </div>

</form>


</div>






@endsection