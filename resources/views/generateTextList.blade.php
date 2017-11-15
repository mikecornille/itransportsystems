@extends('layouts.app')

@section('content')


<div class="container">

<div class="row">

<div class="col-md-6">

<h3>Booked</h3>

@foreach ($loads as $load)
    
	<p>Driver's Cell: {{ $load->carrier_driver_cell }}</p>
    <p class="text-primary">Good Morning this is {{ \Auth::user()->name }} with International Transport Systems, I was checking to see how you are looking for pick up at {{ $load->pick_company }} in {{ $load->pick_city . ', ' . $load->pick_state }}?  PRO # {{ $load->id }}</p>
    
    <p>Pick Date: {{ $load->pick_date . ' ' . $load->pick_time }} ---- Delivery Date: {{ $load->delivery_date . ' ' . $load->delivery_time }}</p>
    <p>Short Status Mesage: {{ $load->quick_status_notes }}</p>

    <hr style="height:1px;border:none;color:#333;background-color:#333;" />

@endforeach

</div>

<div class="col-md-6">

<h3>Loaded</h3>

@foreach ($picked as $pick)
    
	<p>Driver's Cell: {{ $pick->carrier_driver_cell }}</p>
    <p class="text-warning">Good Morning this is {{ \Auth::user()->name }} with International Transport Systems, I was checking to see how you are looking for delivery at {{ $pick->delivery_company }} in {{ $pick->delivery_city . ', ' . $pick->delivery_state }}?  PRO # {{ $pick->id }}</p>
    <p>Pick Date: {{ $pick->pick_date . ' ' . $pick->pick_time }} ---- Delivery Date: {{ $pick->delivery_date . ' ' . $pick->delivery_time }}</p>
    <p>Short Status Mesage: {{ $pick->quick_status_notes }}</p>

    <hr style="height:1px;border:none;color:#333;background-color:#333;" />

@endforeach



</div>


</div>

</div>



@endsection