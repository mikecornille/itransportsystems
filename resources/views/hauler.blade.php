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

    {!! Form::open(['route' => 'hauler.store']) !!}
      <input type="hidden" name="fmcsa_time" id="fmcsa_time" value="Get Updated Info">
      @include('partials.carrierForm', ['submitButtonText' => 'New Carrier'])
    {!! Form::close() !!}
  </div>

@endsection