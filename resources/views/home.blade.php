@extends('layouts.app')

@section('content')




<input type="text" id="location-search" placeholder="Search Databases..."></input>

<input type="text" id="customer-search" placeholder="Search Databases..."></input>




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

<div class="home_form">

<form role="form" class="form-horizontal" method="POST" action="/new">
        
        {{ csrf_field() }}

<div id="customer_home">
    <div class="well">
      
      
      <div class="form-group">
        <div class="row">
            <div class="col-xs-12">
                <label class="label-control" for="customer_name">CUSTOMER</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name') }}">
            </div>
            <div class="col-xs-12">
                <label class="label-control" for="customer_address">Address</label>
                <input type="text" class="form-control" id="customer_address" name="customer_address" value="{{ old('customer_address') }}">
            </div>
            <div class="col-xs-12">
                <label class="label-control" for="customer_city">City</label>
                <input type="text" class="form-control" id="customer_city" name="customer_city" value="{{ old('customer_city') }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_state">State</label>
                <input type="text" class="form-control" id="customer_state" name="customer_state" value="{{ old('customer_state') }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_zip">Zip</label>
                <input type="text" class="form-control" id="customer_zip" name="customer_zip" value="{{ old('customer_zip') }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_contact">Contact</label>
                <input type="text" class="form-control" id="customer_contact" name="customer_contact" value="{{ old('customer_contact') }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_email">Email</label>
                <input type="text" class="form-control" id="customer_email" name="customer_email" value="{{ old('customer_email') }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_phone">Phone</label>
                <input type="text" class="form-control" id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_fax">Fax</label>
                <input type="text" class="form-control" id="customer_fax" name="customer_fax" value="{{ old('customer_fax') }}">
            </div>
          </div> 
        </div> 
    </div> 
</div> 




<div id="origin_home">
  <div class="well">
    <div class="form-group">
        <div class="row">
          <div class="col-xs-12">
            <label class="label-control" for="pick_company">ORIGIN</label>
            <input type="text" class="form-control" id="pick_company" name="pick_company" value="{{ old('pick_company') }}">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="pick_address">Address</label>
            <input type="text" class="form-control" id="pick_address" name="pick_address" value="{{ old('pick_address') }}">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="pick_city">City</label>
            <input type="text" class="form-control" id="pick_city" name="pick_city" value="{{ old('pick_city') }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="pick_state">State</label>
            <input type="text" class="form-control" id="pick_state" name="pick_state" value="{{ old('pick_state') }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="pick_zip">Zip</label>
            <input type="text" class="form-control" id="pick_zip" name="pick_zip" value="{{ old('pick_zip') }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="pick_contact">Contact</label>
            <input type="text" class="form-control" id="pick_contact" name="pick_contact" value="{{ old('pick_contact') }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="pick_phone">Phone</label>
            <input type="text" class="form-control" id="pick_phone" name="pick_phone" value="{{ old('pick_phone') }}">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="pick_email">Email</label>
            <input type="text" class="form-control" id="pick_email" name="pick_email" value="{{ old('pick_email') }}">
          </div>
      </div> 
    </div> 
  </div> 
</div> 

<div id="delivery_home">
  <div class="well">
    <div class="form-group">
        <div class="row">
          <div class="col-xs-12">
            <label class="label-control" for="delivery_company">DESTINATION</label>
            <input type="text" class="form-control" id="delivery_company" name="delivery_company" value="{{ old('delivery_company') }}">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="delivery_address">Address</label>
            <input type="text" class="form-control" id="delivery_address" name="delivery_address" value="{{ old('delivery_address') }}">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="delivery_city">City</label>
            <input type="text" class="form-control" id="delivery_city" name="delivery_city" value="{{ old('delivery_city') }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="delivery_state">State</label>
            <input type="text" class="form-control" id="delivery_state" name="delivery_state" value="{{ old('delivery_state') }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="delivery_zip">Zip</label>
            <input type="text" class="form-control" id="delivery_zip" name="delivery_zip" value="{{ old('delivery_zip') }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="delivery_contact">Contact</label>
            <input type="text" class="form-control" id="delivery_contact" name="delivery_contact" value="{{ old('delivery_contact') }}">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="delivery_phone">Phone</label>
            <input type="text" class="form-control" id="delivery_phone" name="delivery_phone" value="{{ old('delivery_phone') }}">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="delivery_email">Email</label>
            <input type="text" class="form-control" id="delivery_email" name="delivery_email" value="{{ old('delivery_email') }}">
          </div>
      </div> 
    </div> 
  </div> 
</div> 

<div id="reference_home">
  <div class="well">
    <div class="form-group">
      <div class="row">
        <div class="col-xs-12">
          <label class="label-control" for="po_number">PO #</label>
          <input type="text" class="form-control" id="po_number" name="po_number" value="{{ old('po_number') }}">
        </div>
        <div class="col-xs-12">
          <label class="label-control" for="ref_number">REF #</label>
          <input type="text" class="form-control" id="ref_number" name="ref_number" value="{{ old('ref_number') }}">
        </div>
        <div class="col-xs-12">
          <label class="label-control" for="bol_number">BOL #</label>
          <input type="text" class="form-control" id="bol_number" name="bol_number" value="{{ old('bol_number') }}">
        </div>
        <div class="col-xs-12">
          <label class="label-control" for="amount_due">Amount Due</label>
          <div class="input-group">
          <span class="input-group-addon">$</span>
          <input type="text" class="form-control" id="amount_due" name="amount_due" value="{{ old('amount_due') }}">
          <span class="input-group-addon">.00</span>
                    </div>
        </div>
        <div class="col-xs-12" id="submit_new_load_button">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> NEW</button>
        </div>
      </div> 
    </div> 
  </div> 
</div>  





<div class="well" id="commodity_div">
    <div class="form-group">
        <label for="commodity">Commodity</label>
        <textarea name="commodity" id="commodity" class="form-control" rows="2">{{ old('commodity') }}</textarea>
    </div>
</div>

<div class="well" id="special_ins_div">
    <div class="form-group">
        <label for="special_ins">Special Instructions (Appear on Rate Con)</label>
        <textarea name="special_ins" id="special_ins" class="form-control" rows="2">{{ old('special_ins') }}</textarea>
    </div>
</div>

<div class="well" id="stops_div">
    <div class="form-group">
        <label for="add_stops">Additional Stops</label>
        <textarea name="add_stops" id="add_stops" class="form-control" rows="2">{{ old('add_stops') }}</textarea>
    </div>
</div>

<div class="well" id="internal_notes_div">
    <div class="form-group">
        <label for="internal_notes">Internal Notes (ITS eyes only)</label>
        <textarea name="internal_notes" id="internal_notes" class="form-control" rows="2">{{ old('internal_notes') }}</textarea>
    </div>
</div>

<div class="well" id="invoice_notes_div">
    <div class="form-group">
        <label for="invoice_notes">Invoice Notes (Appear on Invoice)</label>
        <textarea name="invoice_notes" id="invoice_notes" class="form-control" rows="2">{{ old('invoice_notes') }}</textarea>
    </div>
</div>


</form>

</div>




<div class="container-fluid">

<table id="mainTable" cellspacing="0" class="stripe row-border order-column" style="border-collapse: collapse; width: 2800px; margin-left: 10px; font-size: 12px; table-layout: fixed; word-wrap:break-word;">

        <thead>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>P Status</th>
                <th>P Date</th>
                <th>PT</th>
                <th>D Status</th>
                <th>D Date</th>
                <th>DT</th>
                <th>Billed</th>
                <th>Ref</th>
                <th>Customer</th>
                <th>Carrier</th>
                <th>P Company</th>
                <th>P City</th>
                <th>D Company</th>
                <th>D City</th>
                <th>PO Num</th>
                <th>BOL</th>
                <th>Commodity</th>
                <th>Rate Con</th>
                <th>Creator</th>
                <th>Group</th>
                <th>I Rate</th>
                <th>C Rate</th>
                <th>Trailer</th>
                <th>Signed</th>
                <th>Created</th>
                
                
                
                
                


            </tr>
        </thead>
         <tfoot>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>P Status</th>
                <th>P Date</th>
                <th>PT</th>
                <th>D Status</th>
                <th>D Date</th>
                <th>DT</th>
                <th>Billed</th>
                <th>Ref</th>
                <th>Customer</th>
                <th>Carrier</th>
                <th>P Company</th>
                <th>P City</th>
                <th>D Company</th>
                <th>D City</th>
                <th>PO Num</th>
                <th>BOL</th>
                <th>Commodity</th>
                <th>Rate Con</th>
                <th>Creator</th>
                <th>Group</th>
                <th>I Rate</th>
                <th>C Rate</th>
                <th>Trailer</th>
                <th>Signed</th>
                <th>Created</th>
              
                
           
                

            </tr>
        </tfoot>  
    </table>
    
    </div> 




@endsection
