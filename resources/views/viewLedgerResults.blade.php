@extends('layouts.app')

@section('content')


<h3>Starting Balance {{ $startingBalance }}</h3>

<h3>Ending Balance {{ $endingBalance }}</h3>


@foreach($data as $d)

{{ $d->account_name  . ' ' . $d->running_total }}
<br>

@endforeach


@endsection