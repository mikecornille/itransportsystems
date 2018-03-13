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
      
      {!! Form::model($getCustomer, ['route' => ['customer_accounting_update', $getCustomer->id], 'method' => 'PUT']) !!}
        @include('partials.accountingCustomerForm', ['submitButtonText' => 'Update Customer with No Actions'])
      {!! Form::close() !!}

    </div>
    
  </div>
  

</div>





@endsection

