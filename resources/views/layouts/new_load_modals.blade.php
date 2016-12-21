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