@extends('layouts.app')

@section('content')



<input type="text" class="form-control" id="find-customer-search" placeholder="Customer Search">


<div id="find_customer_wrapper">
  <div class="well">
    <div class="alert alert-success hidden" id="success-alert-customer"></div>


    <div class="form-group">
      <div class="row">
        <input type="hidden" id="cus_id" name="cus_id">
        <div class="col-xs-8">
          <label class="label-control" for="name">CUSTOMER</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="col-xs-4">
          <label class="label-control" for="location_number">LOCATION #</label>
          <input type="text" class="form-control" id="location_number" name="location_number">
        </div>
      </div>
      <div class="row">
        <div class="col-xs-9">
          <label class="label-control" for="address">ADDRESS</label>
          <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="col-xs-3">
          <label class="label-control" for="fax">FAX</label>
          <input type="text" class="form-control" id="fax" name="fax">
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <label class="label-control" for="city">CITY</label>
          <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="col-xs-3">
          <label class="label-control" for="state">STATE</label>
          <input type="text" class="form-control" id="state" name="state">
        </div>
        <div class="col-xs-3">
          <label class="label-control" for="zip">ZIP</label>
          <input type="text" class="form-control" id="zip" name="zip">
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <label class="label-control" for="contact">NAME</label>
          <input type="text" class="form-control" id="contact" name="contact">
        </div>
        <div class="col-xs-4">
          <label class="label-control" for="phone">PHONE</label>
          <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="col-xs-4">
          <label class="label-control" for="email">EMAIL</label>
          <input type="text" class="form-control" id="email" name="email">
        </div>
      </div>



      <div class="row">

        <div class="col-xs-12">
          <label class="label-control" for="internal_notes">INTERNAL NOTES</label>
          <textarea name="internal_notes" id="internal_notes" class="form-control" rows="5"></textarea>
        </div>

      </div>

      <div class="row">
        <div class="col-xs-6">
          <label for="customer_ambassador" class="label-control">CUSTOMER AMBASSADOR</label>
          <select name="customer_ambassador" id="customer_ambassador" class="form-control"> 
            <option value="Open">Open</option>
            <option value="ronc@itransys.com">ronc@itransys.com</option>
            <option value="joem@itransys.com">joem@itransys.com</option>
            <option value="mikec@itransys.com">mikec@itransys.com</option>
            <option value="mikeb@itransys.com">mikeb@itransys.com</option>
            <option value="mattk@itransys.com">mattk@itransys.com</option>
            <option value="mattc@itransys.com">mattc@itransys.com</option>
            <option value="robert@itransys.com">robert@itransys.com</option>
            <option value="aj@itransys.com">aj@itransys.com</option>
            <option value="wanda@itransys.com">wanda@itransys.com</option>
          </select>
        </div>
      </div>


      <button type="button" id="editFindCustomer" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Update</button>

    </div>
  </div>

  @foreach ($getCustomers as $customer)
    <ul style="list-style-type: none;">
      <li><u>CUSTOMER: {{ $customer->name }}</u></li>
      <li>CONTACT: {{ $customer->contact }}</li>
      <li>PHONE: {{ $customer->phone }}</li>
      <li>EMAIL: {{ $customer->email }}</li>
      <li>NOTES: {{ $customer->internal_notes }}</li>
    </ul>
  @endforeach

</div>

  @endsection