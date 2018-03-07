@extends('layouts.app')

@section('content')


<div class="container">

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
      
      {!! Form::model($gethauler, ['route' => ['hauler.accounting', $gethauler->id], 'method' => 'PUT']) !!}
        @include('partials.accountingCarrierForm', ['submitButtonText' => 'Update Carrier with No Actions'])
      {!! Form::close() !!}

    </div>
    <div class="col-md-2">
      <div class="btn-group" id="action_buttons">
        <button type="button" class="btn btn-primary">Actions</button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li class="dropdown-header">Send ACH Request</li>
          <li><a href="{{ URL::to('/ach_email/' . $gethauler->id) }}"><b>Send ACH Request</b></a></li>
        </ul>
      </div>
      
    </div>
  </div>
  

</div>

@endsection