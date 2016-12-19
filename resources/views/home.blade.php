@extends('layouts.app')

@section('content')











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
                <input type="text" class="form-control" id="customer-search" placeholder="Customer Search">
            </div>
            <div class="col-xs-12">
                <label class="label-control" for="customer_name">CUSTOMER</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name') }}">
                    <span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#customerModal" onclick="goToCustomerEditPage()" class="btn btn-secondary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></span>
              </div>
            </div>
            




<!-- <div class="col-xs-6">
            <button type="button" data-toggle="modal" data-target="#customerModal" onclick="goToCustomerEditPage()" class="btn btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
            </div> -->





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
            <input type="text" class="form-control" id="origin-search" placeholder="Origin Search">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="pick_company">ORIGIN</label>
            <div class="input-group">
                    <input type="text" class="form-control" id="pick_company" name="pick_company" value="{{ old('pick_company') }}">
                    <span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#originModal" onclick="goToOriginEditPage()" class="btn btn-secondary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></span>
              </div>
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
            <input type="text" class="form-control" id="delivery-search" placeholder="Delivery Search">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="delivery_company">DESTINATION</label>
            <div class="input-group">
                    <input type="text" class="form-control" id="delivery_company" name="delivery_company" value="{{ old('delivery_company') }}">
                    <span class="input-group-btn"><button type="button" data-toggle="modal" data-target="#destinationModal" onclick="goToDesEditPage()" class="btn btn-secondary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></span>
              </div>
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
          <div class="col-xs-6">
          
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
    <div class="col-xs-12">
            <input type="text" class="form-control" id="equipment-search" placeholder="Equipment Search">
          </div>
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


<!-- MODAL FOR CUSTOMER FORM -->
<div id="customerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Customer Data</h4>
      </div>
      <div class="modal-body">
        <div id="customer_data">
          <div class="well">
            <input type="hidden" id="customer_id" name="customer_id" value="">
        <div class="form-group">
          <div class="row">
            <div class="col-xs-8">
                <label class="label-control" for="name">CUSTOMER</label>
                <input type="text" class="form-control" id="name" name="name" value="">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="location_number">LOCATION #</label>
                <input type="text" class="form-control" id="location_number" name="location_number" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-9">
                <label class="label-control" for="address">ADDRESS</label>
                <input type="text" class="form-control" id="address" name="address" value="">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="fax">FAX</label>
                <input type="text" class="form-control" id="fax" name="fax" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <label class="label-control" for="city">CITY</label>
                <input type="text" class="form-control" id="city" name="city" value="">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="state">STATE</label>
                <input type="text" class="form-control" id="state" name="state" value="">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="zip">ZIP</label>
                <input type="text" class="form-control" id="zip" name="zip" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="name_1">NAME</label>
                <input type="text" class="form-control" id="name_1" name="name_1" value="">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="phone_1">PHONE</label>
                <input type="text" class="form-control" id="phone_1" name="phone_1" value="">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="email_1">EMAIL</label>
                <input type="text" class="form-control" id="email_1" name="email_1" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="name_2">NAME</label>
                <input type="text" class="form-control" id="name_2" name="name_2" value="">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="phone_2">PHONE</label>
                <input type="text" class="form-control" id="phone_2" name="phone_2" value="">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="email_2">EMAIL</label>
                <input type="text" class="form-control" id="email_2" name="email_2" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="name_3">NAME</label>
                <input type="text" class="form-control" id="name_3" name="name_3" value="">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="phone_3">PHONE</label>
                <input type="text" class="form-control" id="phone_3" name="phone_3" value="">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="email_3">EMAIL</label>
                <input type="text" class="form-control" id="email_3" name="email_3" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="name_4">NAME</label>
                <input type="text" class="form-control" id="name_4" name="name_4" value="">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="phone_4">PHONE</label>
                <input type="text" class="form-control" id="phone_4" name="phone_4" value="">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="email_4">EMAIL</label>
                <input type="text" class="form-control" id="email_4" name="email_4" value="">
            </div>
        </div>
        <div class="row">
        <div class="col-xs-12">
            <label class="label-control" for="internal_notes">INTERNAL NOTES</label>
            <textarea name="internal_notes" id="internal_notes" class="form-control" rows="2"></textarea>
        </div>
    </div>
      <button type="button" id="editCustomer" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Update</button>
    </div>
    </div>
    </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL FOR ORIGIN FORM -->
<div id="originModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Origin Data</h4>
      </div>
      <div class="modal-body">

      <div id="location_data">
    <div class="well">
      
      
      <div class="form-group">
      <input type="hidden" id="location_id" name="location_id" value="">
        <div class="row">
            <div class="col-xs-8">
                <label class="label-control" for="location_name">NAME</label>
                <input type="text" class="form-control" id="location_name" name="location_name" value="">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="location_number">LOCATION #</label>
                <input type="text" class="form-control" id="location_number" name="location_number" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="label-control" for="location_address">ADDRESS</label>
                <input type="text" class="form-control" id="location_address" name="location_address" value="">
            </div>
            
        </div>
        <div class="row">
            <div class="col-xs-6">
                <label class="label-control" for="location_city">CITY</label>
                <input type="text" class="form-control" id="location_city" name="location_city" value="">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="location_state">STATE</label>
                <input type="text" class="form-control" id="location_state" name="location_state" value="">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="location_zip">ZIP</label>
                <input type="text" class="form-control" id="location_zip" name="location_zip" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <label class="label-control" for="location_contact">CONTACT</label>
                <input type="text" class="form-control" id="location_contact" name="location_contact" value="">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="location_phone">PHONE</label>
                <input type="text" class="form-control" id="location_phone" name="location_phone" value="">
            </div>
            
        </div>

        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="location_email">EMAIL</label>
                <input type="text" class="form-control" id="location_email" name="location_email" value="">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="location_cell">CELL</label>
                <input type="text" class="form-control" id="location_cell" name="location_cell" value="">
            </div>
        </div>
    <div class="row">
      <div class="col-xs-12">
            <label class="label-control" for="location_notes">LOCATION NOTES</label>
            <textarea name="location_notes" id="location_notes" class="form-control" rows="2"></textarea>
        </div>
    
    </div>

    <button type="button" id="editLocation" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Update</button>

    </div>
    </div>
    </div>
        
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL FOR DELIVERY FORM -->
<div id="destinationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delivery Data</h4>
      </div>
      <div class="modal-body">

      <div id="dest_data">
    <div class="well">
      
      
      <div class="form-group">
      <input type="hidden" id="dest_id" name="dest_id" value="">
        <div class="row">
            <div class="col-xs-8">
                <label class="label-control" for="dest_name">NAME</label>
                <input type="text" class="form-control" id="dest_name" name="dest_name" value="">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="dest_number">LOCATION #</label>
                <input type="text" class="form-control" id="dest_number" name="dest_number" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="label-control" for="dest_address">ADDRESS</label>
                <input type="text" class="form-control" id="dest_address" name="dest_address" value="">
            </div>
            
        </div>
        <div class="row">
            <div class="col-xs-6">
                <label class="label-control" for="dest_city">CITY</label>
                <input type="text" class="form-control" id="dest_city" name="dest_city" value="">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="dest_state">STATE</label>
                <input type="text" class="form-control" id="dest_state" name="dest_state" value="">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="dest_zip">ZIP</label>
                <input type="text" class="form-control" id="dest_zip" name="dest_zip" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <label class="label-control" for="dest_contact">CONTACT</label>
                <input type="text" class="form-control" id="dest_contact" name="dest_contact" value="">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="dest_phone">PHONE</label>
                <input type="text" class="form-control" id="dest_phone" name="dest_phone" value="">
            </div>
            
        </div>

        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="dest_email">EMAIL</label>
                <input type="text" class="form-control" id="dest_email" name="dest_email" value="">
            </div>
            <div class="col-xs-4">
                <label class="label-control" for="dest_cell">CELL</label>
                <input type="text" class="form-control" id="dest_cell" name="dest_cell" value="">
            </div>
        </div>
    <div class="row">
      <div class="col-xs-12">
            <label class="label-control" for="dest_notes">LOCATION NOTES</label>
            <textarea name="dest_notes" id="dest_notes" class="form-control" rows="2"></textarea>
        </div>
    
    </div>

    <button type="button" id="editDest" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Update</button>

    </div>
    </div>
    </div>
        
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@endsection
