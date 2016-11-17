@extends('layouts.app')

@section('content')


<div class="container-fluid">

<div id="customer">
    <div class="well">
      <form role="form" class="form-horizontal" method="POST" action="/new/">
        
        {{ csrf_field() }}
      
      <div class="form-group">
        <div class="row">
            <div class="col-xs-12">
                <label class="label-control" for="customer_name">CUSTOMER</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name">
            </div>
            <div class="col-xs-12">
                <label class="label-control" for="customer_address">Address</label>
                <input type="text" class="form-control" id="customer_address" name="customer_address">
            </div>
            <div class="col-xs-12">
                <label class="label-control" for="customer_city">City</label>
                <input type="text" class="form-control" id="customer_city" name="customer_city">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_state">State</label>
                <input type="text" class="form-control" id="customer_state" name="customer_state">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_zip">Zip</label>
                <input type="text" class="form-control" id="customer_zip" name="customer_zip">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_contact">Contact</label>
                <input type="text" class="form-control" id="customer_contact" name="customer_contact">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_email">Email</label>
                <input type="text" class="form-control" id="customer_email" name="customer_email">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_phone">Phone</label>
                <input type="text" class="form-control" id="customer_phone" name="customer_phone">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="customer_fax">Fax</label>
                <input type="text" class="form-control" id="customer_fax" name="customer_fax">
            </div>
          </div> <!-- row -->
        </div> <!-- form group -->
    </div> <!-- customer well -->
</div> <!-- customer div -->



<div id="origin">
  <div class="well">
    <div class="form-group">
        <div class="row">
          <div class="col-xs-12">
            <label class="label-control" for="pick_company">ORIGIN</label>
            <input type="text" class="form-control" id="pick_company" name="pick_company">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="pick_address">Address</label>
            <input type="text" class="form-control" id="pick_address" name="pick_address">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="pick_city">City</label>
            <input type="text" class="form-control" id="pick_city" name="pick_city">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="pick_state">State</label>
            <input type="text" class="form-control" id="pick_state" name="pick_state">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="pick_zip">Zip</label>
            <input type="text" class="form-control" id="pick_zip" name="pick_zip">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="pick_contact">Contact</label>
            <input type="text" class="form-control" id="pick_contact" name="pick_contact">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="pick_phone">Phone</label>
            <input type="text" class="form-control" id="pick_phone" name="pick_phone">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="pick_email">Email</label>
            <input type="text" class="form-control" id="pick_email" name="pick_email">
          </div>
      </div> <!-- row -->
    </div> <!-- form group -->
  </div> <!-- well -->
</div> <!-- origin div -->

<div id="delivery">
  <div class="well">
    <div class="form-group">
        <div class="row">
          <div class="col-xs-12">
            <label class="label-control" for="delivery_company">DESTINATION</label>
            <input type="text" class="form-control" id="delivery_company" name="v_company">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="delivery_address">Address</label>
            <input type="text" class="form-control" id="delivery_address" name="delivery_address">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="delivery_city">City</label>
            <input type="text" class="form-control" id="delivery_city" name="delivery_city">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="delivery_state">State</label>
            <input type="text" class="form-control" id="delivery_state" name="delivery_state">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="delivery_zip">Zip</label>
            <input type="text" class="form-control" id="delivery_zip" name="delivery_zip">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="delivery_contact">Contact</label>
            <input type="text" class="form-control" id="delivery_contact" name="delivery_contact">
          </div>
          <div class="col-xs-6">
            <label class="label-control" for="delivery_phone">Phone</label>
            <input type="text" class="form-control" id="delivery_phone" name="delivery_phone">
          </div>
          <div class="col-xs-12">
            <label class="label-control" for="delivery_email">Email</label>
            <input type="text" class="form-control" id="delivery_email" name="delivery_email">
          </div>
      </div> <!-- row -->
    </div> <!-- form group -->
  </div> <!-- well -->
</div> <!-- delivery div -->

<div id="reference">
  <div class="well">
    <div class="form-group">
      <div class="row">
        <div class="col-xs-12">
          <label class="label-control" for="po_number">PO #</label>
          <input type="text" class="form-control" id="po_number" name="po_number">
        </div>
        <div class="col-xs-12">
          <label class="label-control" for="ref_number">REF #</label>
          <input type="text" class="form-control" id="ref_number" name="ref_number">
        </div>
        <div class="col-xs-12">
          <label class="label-control" for="bol_number">BOL #</label>
          <input type="text" class="form-control" id="bol_number" name="bol_number">
        </div>
        <div class="col-xs-12">
          <label class="label-control" for="amount_due">Amount Due</label>
          <input type="text" class="form-control" id="amount_due" name="amount_due">
        </div>
        <div class="col-xs-12">
          <label class="label-control" for="name">Invoice Created</label>
          <input type="text" class="form-control datepicker" id="datepicker4" name="creation_date" value="">
        </div>
      </div> <!-- row -->
    </div> <!-- form group -->
  </div> <!-- well -->
</div>  <!-- reference div -->

</div>

<div class="container-fluid">

<div id="commodity_div">
    <div class="well">
        <label for="commodity">Commodity</label>
        <textarea name="commodity" id="commodity" class="form-control" rows="2"></textarea>
    </div>
</div>

<div id="special_ins_div">
    <div class="well">
        <label for="special_ins">Special Instructions (These notes appear on Rate Con Only)</label>
        <textarea name="special_ins" id="special_ins" class="form-control" rows="2"></textarea>
    </div>
</div>

<div id="stops_div">
    <div class="well">
        <label for="add_stops">Additional Stops</label>
        <textarea name="add_stops" id="add_stops" class="form-control" rows="2"></textarea>
    </div>
</div>

<div id="internal_notes_div">
    <div class="well">
        <label for="internal_notes">Internal Notes (These notes are for ITS eyes only)</label>
        <textarea name="internal_notes" id="internal_notes" class="form-control" rows="2"></textarea>
    </div>
</div>

<div id="invoice_notes_div">
    <div class="well">
        <label for="invoice_notes">Invoice Notes (These notes get attached to the Invoice)</label>
        <textarea name="invoice_notes" id="invoice_notes" class="form-control" rows="2"></textarea>
    </div>
</div>

                  <button type="submit" class="btn btn-primary">NEW</button>

</form>

</div> 




<div class="container-fluid">
<div class="well">
<table id="mainTable" cellspacing="0" class="stripe row-border order-column" width="100%">
        <thead>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>CreatedOn</th>
                <th>Pick Status</th>
                <th>Pick Date</th>
                <th>Pick Time</th>
                <th>Del Status</th>
                <th>Del Date</th>
                <th>Del Time</th>
                <th>Billed</th>
                <th>Reference</th>
                <th>Customer</th>
                <th>Carrier</th>
                <th>Pick Company</th>
                <th>Pick City</th>
                <th>Del Company</th>
                <th>Del City</th>
                <th>PO Num</th>
                <th>BOL</th>
                <th>Commodity</th>
                <th>Rate Con</th>
                <th>Creator</th>
                <th>Group</th>
                <th>Amount</th>
                <th>Carrier Rate</th>
                <th>Trailer Type</th>
                <th>Signed</th>
                
                
                
                
                
                


            </tr>
        </thead>
         <tfoot>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>CreatedOn</th>
                <th>Pick Status</th>
                <th>Pick Date</th>
                <th>Pick Time</th>
                <th>Del Status</th>
                <th>Del Date</th>
                <th>Del Time</th>
                <th>Billed</th>
                <th>Reference</th>
                <th>Customer</th>
                <th>Carrier</th>
                <th>Pick Company</th>
                <th>Pick City</th>
                <th>Del Company</th>
                <th>Del City</th>
                <th>PO Num</th>
                <th>BOL</th>
                <th>Commodity</th>
                <th>Rate Con</th>
                <th>Creator</th>
                <th>Group</th>
                <th>Amount</th>
                <th>Carrier Rate</th>
                <th>Trailer Type</th>
                <th>Signed</th>
              
                
           
                

            </tr>
        </tfoot>  
    </table>
    </div>
    </div>



@endsection
