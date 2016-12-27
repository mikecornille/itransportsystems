@extends('layouts.app')

@section('content')


<h1 class="text-center">To Be Delivered (pick status = loaded)</h1>

<table id="mainTableThree" cellspacing="0" class="stripe row-border order-column hover" style="border-collapse: collapse; margin-left: 10px; font-size: 12px; table-layout: fixed; word-wrap:break-word;">

        <thead>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>Status</th>
                <th>Delivery Date</th>
                <th>Delivery Time</th>
                <th>Carrier</th>
                <th>Customer</th>
                <th>Pick City</th>
                <th>Delivery City</th>
              </tr>
        </thead>
         <!-- <tfoot>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>Status</th>
                <th>Pick Date</th>
                <th>Pick Time</th>
                <th>Customer</th>
                <th>Pick City</th>
                <th>Delivery City</th>
            </tr>
        </tfoot>  --> 
    </table>






@endsection