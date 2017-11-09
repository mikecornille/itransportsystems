@extends('layouts.app')

@section('content')


<div class="container">

<div class="row">

<div class="col-md-6">

<a href="{{ URL::to('/bookedTextList/') }}" class="btn btn-primary" role="button">Booked</a>

</div>

<div class="col-md-6">

<a href="{{ URL::to('/loadedTextList/') }}" class="btn btn-primary" role="button">Loaded</a>

</div>


</div>

@endsection