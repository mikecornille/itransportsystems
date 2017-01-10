@extends('layouts.app')

@section('content')






<h1 class="text-center">Welcome, {{ \Auth::user()->name }}</h1>

<div style="margin-left: 300px;">
<h3 class="text-left">Today's Date is {{ $currentDate }}</h3>
<h3 class="text-left">Your team has created {{ $rateConDailyTotals }} Rate Confirmations and {{ $invoiceDailyTotals }} Invoices today.</h3>

</div>



@endsection