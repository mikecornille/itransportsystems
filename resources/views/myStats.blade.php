@extends('layouts.app')

@section('content')



<h1 class="text-center">Welcome, {{ \Auth::user()->name }}</h1>

<div style="margin-left: 300px;">
<h3 class="text-left">You've written...</h3>
<h3 class="text-left">{{ $posts }} Notes</h3> 
<h3 class="text-left">{{ $rateCons }} Rate Confirmations</h3>
<h3 class="text-left">{{ $invoices }} Invoices</h3>
</div>

<div style="margin-left: 300px;">
@foreach ($unsigned as $unsign)
    <h3 class="text-left">PRO # {{ $unsign->id }} is unsigned</h3>
@endforeach
</div>

@endsection