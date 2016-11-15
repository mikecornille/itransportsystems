@extends('layouts.app')

@section('content')


<div class="container-fluid">

<div id="customer_container">
    <div class="well">
        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    <label class="label-control" for="customer_name">Customer</label>
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
                        
                    <div class="col-xs-12">
                        <label class="label-control" for="quick_status_notes">Status Notes/Check Memo</label>
                        <input type="text" class="form-control" id="quick_status_notes" name="quick_status_notes">
                    </div>
                    
                        <div class="col-xs-12">
                            <label for="cohort_message" class="label-control">Internal Email Recipient</label>
                                <select name="cohort_message" id="cohort_message" class="form-control">
                                  <option value="Please Choose One">Please Choose One</option>
                                  <option value="joem@itransys.com">Joe Mowrer</option>
                                  <option value="mikeb@itransys.com">Mike Bruschuk</option>
                                  <option value="mattk@itransys.com">Matt King</option>
                                  <option value="mattc@itransys.com">Matt Carnahan</option>
                                  <option value="mikec@itransys.com">Mike Cornille</option>
                                  <option value="ronc@itransys.com">Ron Cornille</option>
                                  <option value="robert@itransys.com">Robert Bansberg</option>
                                  <option value="aj@itransys.com">AJ Mesik</option>
                                  <option value="lianey@itransys.com">Liane Cornille</option>
                                  <option value="jennifer@itransys.com">Jennifer Wendell</option>
                                  <option value="molly@itransys.com">Molly Karcz</option>
                                  <option value="wanda@itransys.com">Wanda Giovingo</option>
                                </select>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>

<div id="carrier_container">
    <div class="well">

        <div class="form-group">

            <div class="row">

                <div class="col-xs-12">

                    <label class="label-control" for="carrier_name">Carrier</label>
                    <input type="text" class="form-control" id="carrier_name" name="carrier_name">

                </div>

                <div class="col-xs-12">

                    <label class="label-control" for="carrier_address">Address</label>
                    <input type="text" class="form-control" id="carrier_address" name="carrier_address">

                </div>

                <div class="col-xs-12">

                    <label class="label-control" for="carrier_city">City</label>
                    <input type="text" class="form-control" id="carrier_city" name="carrier_city">

                </div>

                
                            <div class="col-xs-6">
                                <label class="label-control" for="carrier_state">State</label>
                                <input type="text" class="form-control" id="customer_state" name="customer_state">
                            </div>
                            <div class="col-xs-6">
                                <label class="label-control" for="carrier_zip">Zip</label>
                                <input type="text" class="form-control" id="carrier_zip" name="carrier_zip">
                            </div>
                       

                    
                            <div class="col-xs-6">
                                <label class="label-control" for="carrier_contact">Contact</label>
                                <input type="text" class="form-control" id="carrrier_contact" name="carrrier_contact">
                            </div>
                            <div class="col-xs-6">
                                <label class="label-control" for="carrier_email">Email</label>
                                <input type="text" class="form-control" id="carrier_email" name="carrier_email">
                            </div>
                        

                    
                            <div class="col-xs-6">
                                <label class="label-control" for="carrier_phone">Phone</label>
                                <input type="text" class="form-control" id="carrrier_phone" name="carrrier_phone">
                            </div>
                            <div class="col-xs-6">
                                <label class="label-control" for="carrier_fax">Fax</label>
                                <input type="text" class="form-control" id="carrier_fax" name="carrier_fax">
                            </div>
                        

                    
                            <div class="col-xs-6">
                                <label class="label-control" for="carrier_driver_name">Driver Name</label>
                                <input type="text" class="form-control" id="carrier_driver_name" name="carrier_driver_name">
                            </div>
                            <div class="col-xs-6">
                                <label class="label-control" for="carrier_driver_cell">Driver Cell</label>
                                <input type="text" class="form-control" id="carrier_driver_cell" name="carrier_driver_cell">
                            </div>
                        

                    <div class="form-group">
      <div class="col-xs-12">
        <label for="trailer_type" class="label-control">Trailer Type</label>
          <select name="trailer_type" id="trailer_type" class="form-control">
              <option value="Please Choose One">Please Choose One</option>
              <option value="45/96 FLATBED">45/96 FLATBED</option>
              <option value="45/102 FLATBED">45/102 FLATBED</option>
              <option value="48/96 FLATBED">48/96 FLATBED</option>
              <option value="48/102 FLATBED">48/102 FLATBED</option>
              <option value="48/102 FLATBED W/SIDES">48/102 FLATBED W/SIDES</option>
              <option value="53/102 FLATBED">53/102 FLATBED</option>
              <option value="53/102 FLATBED W/SIDES">53/102 FLATBED W/SIDES</option>
              <option value="48/102 STEPDECK">48/102 STEPDECK</option>
              <option value="48/102 STEPDECK W/RAMPS">48/102 STEPDECK W/RAMPS</option>
                    <option value="53/102 STEPDECK">53/102 STEPDECK</option>
              <option value="53/102 STEPDECK W/RAMPS">53/102 STEPDECK W/RAMPS</option>
              <option value="48/96 CONESTOGA">48/96 CONESTOGA</option>
              <option value="48/102 CONESTOGA">48/102 CONESTOGA</option>
              <option value="53/102 CONESTOGA">53/102 CONESTOGA</option>
              <option value="48/102 STEP CONESTOGA">48/102 STEP CONESTOGA</option>
              <option value="53/102 STEP CONESTOGA">53/102 STEP CONESTOGA</option>
              <option value="20FT HOT SHOT">20FT HOT SHOT</option>
              <option value="25FT HOT SHOT">25FT HOT SHOT</option>
              <option value="30FT HOT SHOT">30FT HOT SHOT</option>
              <option value="40FT HOT SHOT">40FT HOT SHOT</option>
              <option value="48/102 DRY VAN">48/102 DRY VAN</option>
              <option value="53/102 DRY VAN">53/102 DRY VAN</option>
              <option value="POWER ONLY">POWER ONLY</option>
              <option value="RGN LOWBOY">RGN LOWBOY</option>
              <option value="MULTI 7-AXLE RGN LOWBOY">MULTI 7-AXLE RGN LOWBOY</option>
              <option value="POWER ONLY">RGN EXTENDABLE</option>
              <option value="RGN LOWBOY">DOUBLE DROP</option>
              <option value="LOWBOY">LOWBOY</option>
              <option value="LANDOLL">LANDOLL</option>
              <option value="ROLLBACK">ROLLBACK</option>
              <option value="AUTO CARRIER">AUTO CARRIER</option>
              <option value="STRAIGHT TRUCK">STRAIGHT TRUCK</option>
          </select>
      </div>
    </div>

            </div>

        </div>

    </div>
</div>

<div id="origin_container">
    <div class="well">

        <div class="form-group">

            <div class="row">

                <div class="col-xs-12">

                    <label class="label-control" for="pick_company">Origin</label>
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


                
                            <div class="col-xs-6">
                                <label class="label-control" for="pick_date">Pick Date</label>
                                <input type="text" class="form-control datepicker" id="datepicker" name="pick_date">
                            </div>
                            <div class="col-xs-6">
                                <label class="label-control text-danger" for="pick_time">Time</label>
            <select name="pick_time" id="pick_time" class="form-control">

              <option value="0600">0600</option>
              <option value="0630">0630</option>
              <option value="0700" selected>0700</option>
              <option value="0730">0730</option>
              <option value="0800">0800</option>
              <option value="0830">0830</option>
              <option value="0900">0900</option>
              <option value="0930">0930</option>
              <option value="1000">1000</option>
              <option value="1030">1030</option>
              <option value="1100">1100</option>
              <option value="1130">1130</option>
              <option value="1200">1200</option>
              <option value="1230">1230</option>
              <option value="1300">1300</option>
              <option value="1330">1330</option>
              <option value="1400">1400</option>
              <option value="1430">1430</option>
              <option value="1500">1500</option>
              <option value="1530">1530</option>
              <option value="1600">1600</option>
              <option value="1630">1630</option>
              <option value="1700">1700</option>
              <option value="1730">1730</option>
              <option value="1800">1800</option>
              <option value="1830">1830</option>
              <option value="1900">1900</option>
              <option value="1930">1930</option>
              <option value="2000">2000</option>
<option value="2030">2030</option>
        <option value="2100">2100</option>
<option value="2130">2130</option>
        <option value="2200">2200</option>
<option value="2230">2230</option>
        <option value="2300">2300</option>
<option value="2330">2330</option>
        <option value="2400">2400</option>



            </select>
                            </div>
                        


                    <div class="col-xs-6">
          <label for="pick_status" class="label-control text-danger">Pick Status</label>
            <select name="pick_status" id="pick_status" class="form-control">
              <option value="Open">Open</option>
              <option value="Booked">Booked</option>
              <option value="Loaded">Loaded</option>
              <option value="Hold">Hold</option>
              <option value="Cancelled">Cancelled</option>
              <option value="TONU">TONU</option>
              <option value="Towing">Towing</option>
            </select>
        </div>

            </div>

        </div>

    </div>
</div>

<div id="destination_container">
    <div class="well">

        <div class="form-group">

            <div class="row">

                <div class="col-xs-12">

                    <label class="label-control" for="delivery_company">Destination</label>
                    <input type="text" class="form-control" id="delivery_company" name="delivery_company">

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


                
                            <div class="col-xs-6">
                                <label class="label-control" for="delivery_date">Delivery Date</label>
                                <input type="text" class="form-control datepicker" id="datepicker2" name="delivery_date">
                            </div>
                            <div class="col-xs-6">
                                <label class="label-control text-danger" for="delivery_time">Time</label>
            <select name="delivery_time" id="delivery_time" class="form-control">

              <option value="0600">0600</option>
              <option value="0630">0630</option>
              <option value="0700" selected>0700</option>
              <option value="0730">0730</option>
              <option value="0800">0800</option>
              <option value="0830">0830</option>
              <option value="0900">0900</option>
              <option value="0930">0930</option>
              <option value="1000">1000</option>
              <option value="1030">1030</option>
              <option value="1100">1100</option>
              <option value="1130">1130</option>
              <option value="1200">1200</option>
              <option value="1230">1230</option>
              <option value="1300">1300</option>
              <option value="1330">1330</option>
              <option value="1400">1400</option>
              <option value="1430">1430</option>
              <option value="1500">1500</option>
              <option value="1530">1530</option>
              <option value="1600">1600</option>
              <option value="1630">1630</option>
              <option value="1700">1700</option>
              <option value="1730">1730</option>
              <option value="1800">1800</option>
              <option value="1830">1830</option>
              <option value="1900">1900</option>
              <option value="1930">1930</option>
              <option value="2000">2000</option>
<option value="2030">2030</option>
        <option value="2100">2100</option>
<option value="2130">2130</option>
        <option value="2200">2200</option>
<option value="2230">2230</option>
        <option value="2300">2300</option>
<option value="2330">2330</option>
        <option value="2400">2400</option>



            </select>
                            </div>
                        


                    <div class="col-xs-6">
          <label for="pick_status" class="label-control text-danger">Del Status</label>
            <select name="delivery_status" id="delivery_status" class="form-control">
              <option value="Open">Open</option>
              <option value="Delivered">Delivered</option>
              <option value="Towing">Towing</option>
            </select>
        </div>

            </div>

        </div>

    </div>
</div>

<div id="reference_container">
    <div class="well">

        <div class="form-group">

            <div class="row">

                <div class="col-xs-10">

                    
                      <label class="label-control" for="pro_number">PRO #</label>
                      <div class="input-group">
                    <span class="input-group-btn">
                      <input type="text" class="form-control" id="id" name="pro_number">
                      <button class="btn btn-success" id="search_pro_number" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </span>
                    </div>

                </div>

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
        <label for="created_by" class="label-control">Created By</label>
          <select name="created_by" id="created_by" class="form-control">
              <option value="Please Choose One">Please Choose One</option>
              <option value="Bruschuk">Bruschuk</option>
              <option value="Mowrer">Mowrer</option>
              <option value="King">King</option>
              <option value="Carnahan">Carnahan</option>
              <option value="M. Cornille">M. Cornille</option>
              <option value="R. Cornille">R. Cornille</option>
              <option value="Bansberg">Bansberg</option>
              <option value="Mesik">Mesik</option>
              <option value="Giovingo">Giovingo</option>
           </select>
      </div>


     
      <div class="col-xs-12">
        <label for="its_group" class="label-control">Group</label>
          <select name="its_group" id="its_group" class="form-control">
              <option value="Please Choose One">Please Choose One</option>
              <option value="UR">UR</option>
              <option value="SUN">SUN</option>
              <option value="FM">FM</option>
              <option value="MJM">MJM</option>
              <option value="JM">JM</option>
              <option value="BLUE">BLUE</option>
              <option value="CSX">CSX</option>
           </select>
      </div>

      
                            <div class="col-xs-6">
                                <label class="label-control" for="vendor_invoice_number">Vendor Invoice #</label>
                                <input type="text" class="form-control" id="vendor_invoice_number" name="vendor_invoice_number">
                            </div>
                            <div class="col-xs-6">
                                <label class="label-control" for="vendor_invoice_date">Vendor Invoice Date</label>
                                <input type="text" class="form-control datepicker" id="datepicker3" name="vendor_invoice_date">
                            </div>
                       
   

        </div>
         </div>

    </div>
</div>

<div id="accounting_container">
    <div class="well">

        <div class="form-group">

            <div class="row">

                <div class="col-xs-12">

                    <label class="label-control" for="amount_due">Amount Due</label>
                    <input type="text" class="form-control" id="amount_due" name="amount_due">

                </div>

                <div class="col-xs-12">

                    <label class="label-control" for="carrier_rate">Carrier Rate</label>
                    <input type="text" class="form-control" id="carrier_rate" name="carrier_rate">

                </div>

                <div class="col-xs-12">

                    <label class="label-control" for="signed_rate_con">Signed Rate Con</label>
                    <input type="text" class="form-control" id="signed_rate_con" name="signed_rate_con">

                </div>

                <div class="col-xs-12">

                    <label class="label-control" for="name">Invoice Created</label>
                    <input type="text" class="form-control datepicker" id="datepicker4" name="creation_date">

                </div>

                <div class="col-xs-12">

                    <label class="label-control" for="rate_con_creation_date">Rate Con Create</label>
                    <input type="text" class="form-control datepicker" id="datepicker5" name="rate_con_creation_date">

                </div>

                <div class="col-xs-12">

                    <label class="label-control" for="billed_date">Billed Date</label>
                    <input type="text" class="form-control" id="datepicker6" name="billed_date">

                </div>

                <div class="col-xs-12">

                    <label class="label-control" for="approved_carrier_invoice">APVD CRR INV</label>
                    <input type="text" class="form-control" id="datepicker7" name="approved_carrier_invoice">

                </div>

            </div>

        </div>

    </div>
</div>

<div id="commodity_section">
    <div class="well">
        <label for="commodity">Commodity</label>
        <textarea name="commodity" id="commodity" class="form-control" rows="2"></textarea>
    </div>
</div>

<div id="instructions_section">
    <div class="well">
        <label for="instructions">Special Instructions (These notes appear on Rate Con Only)</label>
        <textarea name="instructions" id="instructions" class="form-control" rows="2"></textarea>
    </div>
</div>

<div id="stops_section">
    <div class="well">
        <label for="stops">Additinal Stops</label>
        <textarea name="stops" id="stops" class="form-control" rows="2"></textarea>
    </div>
</div>

<div id="internal_notes_section">
    <div class="well">
        <label for="commodity">Internal Notes (These notes are for ITS eyes only)</label>
        <textarea name="commodity" id="commodity" class="form-control" rows="2"></textarea>
    </div>
</div>

<div id="invoice_notes_section">
    <div class="well">
        <label for="instructions">Invoice Notes (These notes get attached to the Invoice)</label>
        <textarea name="instructions" id="instructions" class="form-control" rows="2"></textarea>
    </div>
</div>

<div id="update_message_section">
    <div class="well">
        <label for="stops">Message (Sent when "Update Customer" or "Email Internal" are clicked)</label>
        <textarea name="stops" id="stops" class="form-control" rows="2"></textarea>
    </div>
</div>

<div class="btn-group">
  <button type="button" class="btn btn-primary">NEW</button>
  <button type="button" class="btn btn-primary">UPDATE</button>
  <button type="button" class="btn btn-primary">PRINT INVOICE</button>
  <button type="button" class="btn btn-primary">EMAIL INVOICE</button>
  <button type="button" class="btn btn-primary">PRINT RATE CON</button>
  <button type="button" class="btn btn-primary">EMAIL RATE CON</button>
  <button type="button" class="btn btn-primary">GET STATUS</button>
  <button type="button" class="btn btn-primary">POD REQUEST</button>
  <button type="button" class="btn btn-primary">UPDATE CUSTOMER</button>
  <button type="button" class="btn btn-primary">EMAIL INTERNAL</button>
  <button type="button" class="btn btn-primary">TO BE LOADED</button>
  <button type="button" class="btn btn-primary">TO BE DELIVERED</button>
  <button type="button" class="btn btn-primary">CONTACT LIST</button>
  <button type="button" class="btn btn-primary">EMAIL BOL</button>
</div>

<div class="well">
<table id="mainTable" cellspacing="0" class="stripe row-border order-column" width="100%">
        <thead>
            <tr>
                <th>Pick City</th>
                <th>Pick State</th>
                <th>Delivery City</th>
                <th>Delivery State</th>
                
                
                
                
                
                


            </tr>
        </thead>
         <tfoot>
            <tr>
                <th>Pick City</th>
                <th>Pick State</th>
                <th>Delivery City</th>
                <th>Delivery State</th>
              
                
           
                

            </tr>
        </tfoot>  
    </table>
    </div>

</div> <!-- end main container -->

@endsection
