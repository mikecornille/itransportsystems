@extends('layouts.app')

@section('content')



<input type="text" class="form-control" id="find-carrier-search" placeholder="Carrier Search">


<div id="find_carrier_wrapper">
          <div class="well">
            <div class="alert alert-success hidden" id="success-alert-carrier"></div>
            
            <div class="form-group">
              <div class="row">
                <input type="hidden" id="car_id" name="car_id">
                <div class="col-xs-6">
                  <label class="label-control" for="car_company">COMPANY</label>
                  <input type="text" class="form-control" id="car_company" name="car_company">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="car_mc_number">MC #</label>
                  <input type="text" class="form-control" id="car_mc_number" name="car_mc_number">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="car_dot_number">DOT #</label>
                  <input type="text" class="form-control" id="car_dot_number" name="car_dot_number">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-9">
                  <label class="label-control" for="car_address">ADDRESS</label>
                  <input type="text" class="form-control" id="car_address" name="car_address">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="car_contact">CONTACT</label>
                  <input type="text" class="form-control" id="car_contact" name="car_contact">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <label class="label-control" for="car_city">CITY</label>
                  <input type="text" class="form-control" id="car_city" name="car_city">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="car_state">STATE</label>
                  <input type="text" class="form-control" id="car_state" name="car_state">
                </div>
                <div class="col-xs-3">
                  <label class="label-control" for="car_zip">ZIP</label>
                  <input type="text" class="form-control" id="car_zip" name="car_zip">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-4">
                  <label class="label-control" for="car_phone">PHONE</label>
                  <input type="text" class="form-control" id="car_phone" name="car_phone">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_fax">FAX</label>
                  <input type="text" class="form-control" id="car_fax" name="car_fax">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_email">EMAIL</label>
                  <input type="text" class="form-control" id="car_email" name="car_email">
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6">
                  <label class="label-control" for="car_driver_name">DRIVER NAME</label>
                  <input type="text" class="form-control" id="car_driver_name" name="car_driver_name">
                </div>
                <div class="col-xs-6">
                  <label class="label-control" for="car_driver_phone">DRIVER PHONE</label>
                  <input type="text" class="form-control" id="car_driver_phone" name="car_driver_phone">
                </div>
                
              </div>

              <div class="row">
                <div class="col-xs-4">
                  <label class="label-control" for="car_cargo_exp">CARGO EXP.</label>
                  <input type="text" class="form-control" id="car_cargo_exp" name="car_cargo_exp">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_cargo_amount">CARGO AMOUNT</label>
                  <input type="text" class="form-control" id="car_cargo_amount" name="car_cargo_amount">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_bc_contract">BC CONTRACT</label>
                  <input type="text" class="form-control" id="car_bc_contract" name="car_bc_contract">
                </div>
              </div>

              <div class="row">
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="flatbed" id="flatbed">Flatbeds</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="stepdeck" id="stepdeck">Stepdecks</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="conestoga" id="conestoga">Conestogas</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="hot_shot" id="hot_shot">Hot Shots</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="van" id="van">Vans</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="power" id="power">Power Only</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="lowboy" id="lowboy">Lowboys</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="landoll" id="landoll">Landoll</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="towing" id="towing">Towing</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="auto_carrier" id="auto_carrier">Auto Carrier</label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="checkbox">
                    <label><input type="checkbox" name="straight_truck" id="straight_truck">Straight Trucks</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-4">
                  <label class="label-control" for="car_remit_name">REMIT NAME</label>
                  <input type="text" class="form-control" id="car_remit_name" name="car_remit_name">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_remit_address">REMIT ADDRESS</label>
                  <input type="text" class="form-control" id="car_remit_address" name="car_remit_address">
                </div>
              </div>

              <div class="row">
                <div class="col-xs-4">
                  <label class="label-control" for="car_remit_city">REMIT CITY</label>
                  <input type="text" class="form-control" id="car_remit_city" name="car_remit_city">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_remit_state">REMIT STATE</label>
                  <input type="text" class="form-control" id="car_remit_state" name="car_remit_state">
                </div>
                <div class="col-xs-4">
                  <label class="label-control" for="car_remit_zip">ZIP</label>
                  <input type="text" class="form-control" id="car_remit_zip" name="car_remit_zip">
                </div>
              </div>

              <div class="row">
                
                <div class="col-xs-12">
                  <label class="label-control" for="car_permanent_notes">PERMANENT NOTES</label>
                  <textarea name="car_permanent_notes" id="car_permanent_notes" class="form-control" rows="2"></textarea>
                </div>
                
              </div>

              <div class="row">
                
                <div class="col-xs-12">
                  <label class="label-control" for="car_load_info">LOAD INFORMATION</label>
                  	<ul>
                  	<li>Load route</li>
                	<li>Carrier rate</li>
                	<li>Detailed trailer type and condition</li>
                	<li>Miles from current drop-off and/or miles from our pick</li>
                	<li>Driver's plans for delivery (other drops, out of hours, etc)</li>
                	<li>Delivery date and time</li>
                	</ul>
                  <textarea name="car_internal_notes" id="car_load_info" class="form-control" rows="2"></textarea>
                </div>
                
              </div>

              <div class="row">
              <div class="col-xs-12">
            <label for="email_colleague_carrier" class="label-control">Colleague Email Recipient</label>
            <select name="email_colleague_carrier" id="email_colleague_carrier" class="form-control"> 
              <option value="Please Choose One">Please Choose One</option>
              <option value="joem@itransys.com">joem@itransys.com</option>
              <option value="mikeb@itransys.com">mikeb@itransys.com</option>
              <option value="mattk@itransys.com">mattk@itransys.com</option>
              <option value="mattc@itransys.com">mattc@itransys.com</option>
              <option value="mikec@itransys.com">mikec@itransys.com</option>
              <option value="ronc@itransys.com">ronc@itransys.com</option>
              <option value="robert@itransys.com">robert@itransys.com</option>
              <option value="aj@itransys.com">aj@itransys.com</option>
              <option value="lianey@itransys.com">lianey@itransys.com</option>
              <option value="jennifer@itransys.com">jennifer@itransys.com</option>
              <option value="molly@itransys.com">molly@itransys.com</option>
              <option value="wanda@itransys.com">wanda@itransys.com</option>
            </select>
          </div>
          </div>



              <div class="btn-group" id="carrier_action_buttons" role="group" aria-label="carrier">
              
              <button type="button" id="editCarrier" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Update</button>

              <button type="button" id="getInsurance" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Insurance</button>

              <button type="button" id="getPacket" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Send Packet</button>

              <button type="button" id="sendCarrierInfo" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Email Colleague</button>
              
              </div>


  
              

              
            </div>
          </div>
          
        </div>





@endsection