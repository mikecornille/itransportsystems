@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10">

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

      <h3 class="text-center"><b>FMCSA LAST UPDATED: {{ $gethauler->fmcsa_time }}</b></h3>
      {!! Form::model($gethauler, ['route' => ['hauler.update', $gethauler->id], 'method' => 'PUT']) !!}
      @include('partials.carrierForm', ['submitButtonText' => 'Update Carrier with No Actions'])
      {!! Form::close() !!}

    </div>
    <div class="col-md-2">
      <div class="btn-group" id="action_buttons">
        <button type="button" class="btn btn-primary">Actions</button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li class="dropdown-header">INSURANCE CERTS</li>
          <li><a href="{{ URL::to('/certInsuranceCompany/' . $gethauler->id) }}"><b>Insurance Provider</b></a></li>
          <li><a href="{{ URL::to('/certCarrier/' . $gethauler->id) }}"><b>Carrier</b></a></li>

          <li class="divider"></li>
          <li class="dropdown-header">COLLEAGUE</li>
          <li><a href="{{ URL::to('/emailColleagueHauler/' . $gethauler->id) }}"><b>Email Colleague</b></a></li>

          <li class="divider"></li>
          <li class="dropdown-header">SEND PACKET</li>
          <li><a href="{{ URL::to('/sendBrokerCarrierPacket/' . $gethauler->id) }}"><b>Broker/Carrier Contract</b></a></li>



        </ul>
      </div>
    </div>
  </div>
  

</div>

@endsection