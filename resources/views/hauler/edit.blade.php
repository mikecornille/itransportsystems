@extends('layouts.app')

@section('content')


<div class="container">


<div class="well col-md-10" style="background: white;">

  <h3>Crash Totals: {{ $getCrashCount }}</h3>
  <div class="row">
    <div class="col-md-3">
      <p>Last Crash Date: {{ $getLastDate->REPORT_DATE }}</p>
    </div>

    <div class="col-md-3">
      <p style="color: red;">Fatal Totals: {{ $getFatalityCount }}</p>
    </div>

    <div class="col-md-3">
      <p>Injury Totals: {{ $getInjuryCount }}</p>
    </div>

    <div class="col-md-3">
      <p>Tow-Away Totals: {{ $getTowTotals }}</p>
    </div>



    </div>
</div>


<div class="well col-md-10" style="background: white;">

  <h3>Inspection Totals (past 2 years): {{ $getSMS[0]->INSP_TOTAL }}</h3>
  <div class="row">
    <div class="col-md-4">
      <p>Driver OOS Totals: {{ $getSMS[0]->DRIVER_OOS_INSP_TOTAL }}</p>
    </div>

    <div class="col-md-4">
      <p>Vehicle OOS Totals: {{ $getSMS[0]->VEHICLE_OOS_INSP_TOTAL }}</p>
    </div>

    <div class="col-md-4">
      <p>Unsafe Driving Violations: {{ $getSMS[0]->UNSAFE_DRIV_INSP_W_VIOL }}</p>
    </div>

    



    </div>

    <div class="row">

      <div class="col-md-4">
      <p>Hours of Service Violations: {{ $getSMS[0]->HOS_DRIV_INSP_W_VIOL }}</p>
    </div>

    <div class="col-md-4">
      <p>Controlled Substance Violations: {{ $getSMS[0]->CONTR_SUBST_INSP_W_VIOL }}</p>
    </div>

    <div class="col-md-4">
      <p>Vehicle Maintenance Violations: {{ $getSMS[0]->VEH_MAINT_INSP_W_VIOL }}</p>
    </div>



    </div>
</div>





  <div class="row">
    <div class="col-md-10">

      @if (!empty($error_message))
      <div class="alert alert-danger alert-dismissible">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ $error_message }}</strong> Click the X at the far right to close this notification.
      </div>
      @endif

      @if (isset($flash_message))
      <div class="alert alert-success alert-dismissible">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ $flash_message }}</strong> Click the X at the far right to close this notification.
      </div>
      @endif

      <!-- <h3 class="text-center"><b>FMCSA LAST UPDATED: {{ $gethauler->fmcsa_time }}</b></h3> -->
      {!! Form::model($gethauler, ['route' => ['hauler.update', $gethauler->id], 'method' => 'PUT']) !!}
       <!-- <input type="hidden" name="fmcsa_time" id="fmcsa_time" value="{{ $gethauler->fmcsa_time }}"> -->
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

          <li class="divider"></li>
          <li class="dropdown-header">REQUEST INFO</li>
          <li><a href="{{ URL::to('/carrierLoadDetails/' . $gethauler->id) }}"><b>Carrier Load Details</b></a></li>
        </ul>
      </div>
      <div style="margin-top: 10px;" >
      <a onclick="googleCarrier('{{ $gethauler->company }}')">GOOGLE CARRIER</a>
      </div>
      <div style="margin-top: 10px;" >
      <a onclick="fmcsaCarrier('{{ $gethauler->dot_number }}')">FMCSA PROFILE</a>
      </div>
    </div>
  </div>
  

</div>

@endsection