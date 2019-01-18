

//PAYING MULTIPLE BILLS
var total = 0;

$('.radio-buttons').on('click', function(){ 

  total += parseInt($(this).attr('data-amount')); 
  $('#subtotal').html(total);
  
});


//SENDS THE INFO TO THE EQUIPMENT MODAL FOR EDITING
function goToEquipmentEditPage() {
  $('#equip_id').val(window.equipmentRecord.item.object.id);
  $('#equip_make').val(window.equipmentRecord.item.object.make);
  $('#equip_model').val(window.equipmentRecord.item.object.model);
  $('#equip_length').val(window.equipmentRecord.item.object.length);
  $('#equip_width').val(window.equipmentRecord.item.object.width);
  $('#equip_height').val(window.equipmentRecord.item.object.height);
  $('#equip_weight').val(window.equipmentRecord.item.object.weight);
  $('#equip_commodity').val(window.equipmentRecord.item.object.commodity);
  $('textarea#equip_loading_instructions').val(window.equipmentRecord.item.object.loading_instructions);
  };
//END NOTES

//GETS THE VALUES FROM THE EQUIPMENT MODAL AND SUBMITS THEM TO COORESPONDING ID IN DATABASE
$(document).on('click', '#editEquip', function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
$.ajax({
        method: 'POST',
        url: './updateEquipment',
        data: {

            id: $("#equip_id").val(),
            make: $("#equip_make").val(),
            model: $("#equip_model").val(),   
            length: $("#equip_length").val(),
            width: $("#equip_width").val(),
            height: $("#equip_height").val(),
            weight: $("#equip_weight").val(),
            commodity: $("#equip_commodity").val(),
            loading_instructions: $("#equip_loading_instructions").val(),

         },
         success: function(result){
                $("#carrier_name").val($("#car_company").val());
                $("#success-alert-equip").removeClass('hidden');
                $("#success-alert-equip").alert();
                $("#success-alert-equip").text('The equipment update has been saved.');
                $("#success-alert-equip").fadeTo(4000, 500).slideUp(500);
               
}
    });
});
// END NOTES

//SENDS THE INFO TO THE CARRIER MODAL FOR EDITING
function goToCarrierEditPage() {
  $('#car_id').val(window.carrierRecord.item.object.id);
  $('#car_company').val(window.carrierRecord.item.object.company);
  $('#car_contact').val(window.carrierRecord.item.object.contact);
  $('#car_mc_number').val(window.carrierRecord.item.object.mc_number);
  $('#car_dot_number').val(window.carrierRecord.item.object.dot_number);
  $('#car_address').val(window.carrierRecord.item.object.address);
  $('#car_city').val(window.carrierRecord.item.object.city);
  $('#car_state').val(window.carrierRecord.item.object.state);
  $('#car_zip').val(window.carrierRecord.item.object.zip);
  $('#car_phone').val(window.carrierRecord.item.object.phone);
  $('#car_fax').val(window.carrierRecord.item.object.fax);
  $('#car_email').val(window.carrierRecord.item.object.email);
  $('#car_driver_name').val(window.carrierRecord.item.object.driver_name);
  $('#car_driver_phone').val(window.carrierRecord.item.object.driver_phone);
  $('#car_cargo_exp').val(window.carrierRecord.item.object.cargo_exp);
  $('#car_cargo_amount').val(window.carrierRecord.item.object.cargo_amount);
  $('#car_bc_contract').val(window.carrierRecord.item.object.bc_contract);
  $('#car_remit_name').val(window.carrierRecord.item.object.remit_name);
  $('#car_remit_address').val(window.carrierRecord.item.object.remit_address);
  $('#car_remit_city').val(window.carrierRecord.item.object.remit_city);
  $('#car_remit_state').val(window.carrierRecord.item.object.remit_state);
  $('#car_remit_zip').val(window.carrierRecord.item.object.remit_zip);
  $('textarea#car_load_info').val(window.carrierRecord.item.object.load_info);
  $('textarea#car_permanent_notes').val(window.carrierRecord.item.object.permanent_notes);
  $('#flatbed').prop('checked', window.carrierRecord.item.object.flatbed);
$('#stepdeck').prop('checked', window.carrierRecord.item.object.stepdeck);
$('#conestoga').prop('checked', window.carrierRecord.item.object.conestoga);
$('#hot_shot').prop('checked', window.carrierRecord.item.object.hot_shot);
$('#van').prop('checked', window.carrierRecord.item.object.van);
$('#power').prop('checked', window.carrierRecord.item.object.power);
$('#lowboy').prop('checked', window.carrierRecord.item.object.lowboy);
$('#landoll').prop('checked', window.carrierRecord.item.object.landoll);
$('#towing').prop('checked', window.carrierRecord.item.object.towing);
$('#auto_carrier').prop('checked', window.carrierRecord.item.object.auto_carrier);
$('#straight_truck').prop('checked', window.carrierRecord.item.object.straight_truck);
$('#email_colleague_carrier').val(window.carrierRecord.item.object.email_colleague_carrier);



// $('#car_bc_contract').on('changeDate', function(ev){
//     $(this).datepicker('hide');
// });
  };
//END NOTES

//GETS THE VALUES FROM THE CARRIER MODAL AND SUBMITS THEM TO COORESPONDING ID IN DATABASE
$(document).on('click', '#editCarrier', function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
$.ajax({
        method: 'POST',
        url: './updateCarrier',
        data: {

            id: $("#car_id").val(),
            company: $("#car_company").val(),
            contact: $("#car_contact").val(),   
            mc_number: $("#car_mc_number").val(),
            dot_number: $("#car_dot_number").val(),
            address: $("#car_address").val(),
            city: $("#car_city").val(),
            state: $("#car_state").val(),
            zip: $("#car_zip").val(),
            phone: $("#car_phone").val(),
            fax: $("#car_fax").val(),
            email: $("#car_email").val(),
            driver_name: $("#car_driver_name").val(),
            driver_phone: $("#car_driver_phone").val(),
            cargo_exp: $("#car_cargo_exp").val(),
            cargo_amount: $("#car_cargo_amount").val(),
            bc_contract: $("#car_bc_contract").val(),
            remit_name: $("#car_remit_name").val(),
            remit_address: $("#car_remit_address").val(),
            remit_city: $("#car_remit_city").val(),
            remit_state: $("#car_remit_state").val(),
            remit_zip: $("#car_remit_zip").val(),
            load_info: $("#car_load_info").val(),
            load_route: $("#car_load_route").val(),
            current_carrier_rate: $("#car_current_carrier_rate").val(),
            current_trailer_type: $("#car_current_trailer_type").val(),
            current_city_location: $("#car_current_city_location").val(),
            current_miles_from_pick: $("#car_current_miles_from_pick").val(),
            delivery_schedule: $("#car_delivery_schedule").val(),
            permanent_notes: $("#car_permanent_notes").val(),
            email_colleague_carrier: $("#email_colleague_carrier").val(),
            flatbed: $("#flatbed").is(':checked'),
            stepdeck: $("#stepdeck").is(':checked'),
            conestoga: $("#conestoga").is(':checked'),
            hot_shot: $("#hot_shot").is(':checked'),
            van: $("#van").is(':checked'),
            power: $("#power").is(':checked'),
            lowboy: $("#lowboy").is(':checked'),
            landoll: $("#landoll").is(':checked'),
            towing: $("#towing").is(':checked'),
            auto_carrier: $("#auto_carrier").is(':checked'),
            straight_truck: $("#straight_truck").is(':checked')

         },
         success: function(result){
                $("#carrier_name").val($("#car_company").val());
                $("#carrier_address").val($("#car_address").val());
                $("#carrier_city").val($("#car_city").val());
                $("#carrier_state").val($("#car_state").val());
                $("#carrier_zip").val($("#car_zip").val());
                $("#carrier_contact").val($("#car_contact").val());
                $("#carrier_email").val($("#car_email").val());
                $("#carrier_phone").val($("#car_phone").val());
                $("#carrier_fax").val($("#car_fax").val());
                $("#carrier_driver_name").val($("#car_driver_name").val());
                $("#carrier_driver_cell").val($("#car_driver_phone").val());
                $("#carrier_mc").val($("#car_mc_number").val());
                $("#remit_name_display").text($("#car_remit_name").val());
                $("#remit_address_display").text($("#car_remit_address").val());
                $("#remit_citystatezip_display").text($("#car_remit_city").val() + ', ' + $("#car_remit_state").val() + ' ' + $("#car_remit_zip").val());
                $("#remit_name").val($("#car_remit_name").val());
                $("#remit_address").val($("#car_remit_address").val());
                $("#remit_city").val($("#car_remit_city").val());
                $("#remit_state").val($("#car_remit_state").val());
                $("#remit_zip").val($("#car_remit_zip").val());
                $("#success-alert-carrier").removeClass('hidden');
                $("#success-alert-carrier").alert();
                $("#success-alert-carrier").text('The carrier update has been saved.');
                $("#success-alert-carrier").fadeTo(4000, 500).slideUp(500);
               
}
    });
});
// END NOTES



// SENDS THE INFO TO THE CUSTOMER MODAL FOR EDITING
function goToCustomerEditPage() {
  $('#name').val(window.customerRecord.item.object.name);
  $('#location_number').val(window.customerRecord.item.object.location_number);
  $('#address').val(window.customerRecord.item.object.address);
  $('#city').val(window.customerRecord.item.object.city);
  $('#state').val(window.customerRecord.item.object.state);
  $('#zip').val(window.customerRecord.item.object.zip);
  $('#fax').val(window.customerRecord.item.object.fax);
  $('#contact').val(window.customerRecord.item.object.contact);
  $('#phone').val(window.customerRecord.item.object.phone);
  $('#email').val(window.customerRecord.item.object.email);
  $('textarea#cus_internal_notes').val(window.customerRecord.item.object.internal_notes);
  $('#customer_id').val(window.customerRecord.item.object.id);
  };
//END NOTES


//GETS THE VALUES FROM THE CUSTOMER MODAL AND SUBMITS THEM TO COORESPONDING ID IN DATABASE
$(document).on('click', '#editCustomer', function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
$.ajax({
        method: 'POST',
        url: './updateCustomer',
        data: {

            id: $("#customer_id").val(),
            name: $("#name").val(),
            location_number: $("#location_number").val(),   
            address: $("#address").val(),
            city: $("#city").val(),
            state: $("#state").val(),
            zip: $("#zip").val(),
            fax: $("#fax").val(),
            contact: $("#contact").val(),
            phone: $("#phone").val(),
            email: $("#email").val(),
            internal_notes: $("#cus_internal_notes").val(),

         },
         success: function(result){
                $("#customer_name").val($("#name").val());
                $("#customer_address").val($("#address").val());
                $("#customer_city").val($("#city").val());
                $("#customer_state").val($("#state").val());
                $("#customer_zip").val($("#zip").val());
                $("#customer_contact").val($("#contact").val());
                $("#customer_email").val($("#email").val());
                $("#customer_phone").val($("#phone").val());
                $("#customer_fax").val($("#fax").val());
                $("#success-alert-display").removeClass('hidden');
                $("#success-alert-display").alert();
                $("#success-alert-display").text('The customer update has been saved.');
                $("#success-alert-display").fadeTo(4000, 500).slideUp(500);
               
}
    });
});
// END NOTES


// SENDS THE INFO TO THE ORIGIN MODAL FOR EDITING
function goToOriginEditPage() {
  $('#location_name').val(window.originRecord.item.object.location_name);
  $('#origin_location_number').val(window.originRecord.item.object.location_number);
  $('#location_address').val(window.originRecord.item.object.address);
  $('#location_city').val(window.originRecord.item.object.city);
  $('#location_state').val(window.originRecord.item.object.state);
  $('#location_zip').val(window.originRecord.item.object.zip);
  $('#location_contact').val(window.originRecord.item.object.contact);
  $('#location_phone').val(window.originRecord.item.object.phone);
  $('#location_email').val(window.originRecord.item.object.email);
  $('#location_cell').val(window.originRecord.item.object.cell);
  $('textarea#location_notes').val(window.originRecord.item.object.location_notes);
  $('#location_id').val(window.originRecord.item.object.id);
  };
//END NOTES


//GETS THE VALUES FROM THE ORIGIN MODAL AND SUBMITS THEM TO COORESPONDING ID IN DATABASE
$(document).on('click', '#editLocation', function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
$.ajax({
        method: 'POST',
        url: './updateLocation',
        data: {
            id: $("#location_id").val(),
            location_name: $("#location_name").val(),
            location_number: $("#origin_location_number").val(),   
            address: $("#location_address").val(),
            city: $("#location_city").val(),
            state: $("#location_state").val(),
            zip: $("#location_zip").val(),
            contact: $("#location_contact").val(),
            phone: $("#location_phone").val(),
            email: $("#location_email").val(),
            cell: $("#location_cell").val(),
            location_notes: $("#location_notes").val(),

         },
         success: function(result){
                $("#pick_company").val($("#location_name").val());
                $("#pick_address").val($("#location_address").val());
                $("#pick_city").val($("#location_city").val());
                $("#pick_state").val($("#location_state").val());
                $("#pick_zip").val($("#location_zip").val());
                $("#pick_contact").val($("#location_contact").val());
                $("#pick_phone").val($("#location_phone").val());
                $("#pick_email").val($("#location_email").val());
                $("#success-alert-origin").removeClass('hidden');
                $("#success-alert-origin").alert();
                $("#success-alert-origin").text('The updated origin information has been saved.');
                $("#success-alert-origin").fadeTo(4000, 500).slideUp(500);
              }
    });
});
//END NOTES


//GETS THE VALUES FROM THE FIND CUSTOMER FORM AND SUBMITS THEM TO COORESPONDING ID IN DATABASE
$(document).on('click', '#editFindCustomer', function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
$.ajax({
        method: 'POST',
        url: './updateCustomer',
        data: {

            id: $("#cus_id").val(),
            name: $("#name").val(),
            location_number: $("#location_number").val(),   
            address: $("#address").val(),
            city: $("#city").val(),
            state: $("#state").val(),
            zip: $("#zip").val(),
            fax: $("#fax").val(),
            contact: $("#contact").val(),
            phone: $("#phone").val(),
            email: $("#email").val(),
            internal_notes: $("#internal_notes").val(),
            customer_ambassador: $("#customer_ambassador").val(), 
            weekly_email: $("#weekly_email").val(),
            

         },
         success: function(result){
                $("#success-alert-customer").removeClass('hidden');
                $("#success-alert-customer").alert();
                $("#success-alert-customer").text('The customer update has been saved.');
                $("#success-alert-customer").fadeTo(4000, 500).slideUp(500);
               
}
    });
});
// END NOTES

// SENDS THE INFO TO THE DELIVERY MODAL FOR EDITING
function goToDesEditPage() {
  $('#dest_name').val(window.deliveryRecord.item.object.location_name);
  $('#dest_number').val(window.deliveryRecord.item.object.location_number);
  $('#dest_address').val(window.deliveryRecord.item.object.address);
  $('#dest_city').val(window.deliveryRecord.item.object.city);
  $('#dest_state').val(window.deliveryRecord.item.object.state);
  $('#dest_zip').val(window.deliveryRecord.item.object.zip);
  $('#dest_contact').val(window.deliveryRecord.item.object.contact);
  $('#dest_phone').val(window.deliveryRecord.item.object.phone);
  $('#dest_email').val(window.deliveryRecord.item.object.email);
  $('#dest_cell').val(window.deliveryRecord.item.object.cell);
  $('textarea#dest_notes').val(window.deliveryRecord.item.object.location_notes);
  $('#dest_id').val(window.deliveryRecord.item.object.id);
  };
//END NOTES

//GETS THE VALUES FROM THE DELIVERY MODAL AND SUBMITS THEM TO COORESPONDING ID IN DATABASE
$(document).on('click', '#editDest', function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
$.ajax({
        method: 'POST',
        url: './updateLocation',
        data: {
            id: $("#dest_id").val(),
            location_name: $("#dest_name").val(),
            location_number: $("#dest_number").val(),   
            address: $("#dest_address").val(),
            city: $("#dest_city").val(),
            state: $("#dest_state").val(),
            zip: $("#dest_zip").val(),
            contact: $("#dest_contact").val(),
            phone: $("#dest_phone").val(),
            email: $("#dest_email").val(),
            cell: $("#dest_cell").val(),
            location_notes: $("#dest_notes").val(),

         },
         success: function(result){
                $("#delivery_company").val($("#dest_name").val());
                $("#delivery_address").val($("#dest_address").val());
                $("#delivery_city").val($("#dest_city").val());
                $("#delivery_state").val($("#dest_state").val());
                $("#delivery_zip").val($("#dest_zip").val());
                $("#delivery_contact").val($("#dest_contact").val());
                $("#delivery_phone").val($("#dest_phone").val());
                $("#delivery_email").val($("#dest_email").val());
                $("#success-alert-dest").removeClass('hidden');
                $("#success-alert-dest").alert();
                $("#success-alert-dest").text('The updated destination information has been saved.');
                $("#success-alert-dest").fadeTo(4000, 500).slideUp(500);
              }
    });
});
//END NOTES

//EMAIL CARRIER INSURANCE REQUEST
$(document).on('click', '#getInsurance', function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
$.ajax({
        method: 'POST',
        url: './getInsurance',
        data: {
            email: $("#car_email").val(),
            name: $("#car_contact").val(),
            company: $("#car_company").val(),   
            mc_number: $("#car_mc_number").val(),
            cargo: $("#car_cargo_exp").val(),


         },
         success: function(result){
                $("#success-alert-carrier").removeClass('hidden');
                $("#success-alert-carrier").alert();
                $("#success-alert-carrier").text('The request for updated insurance has been sent!');
                $("#success-alert-carrier").fadeTo(4000, 500).slideUp(500);
              }
    });
});

//EMAIL CARRIER PACKET REQUEST
$(document).on('click', '#getPacket', function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
$.ajax({
        method: 'POST',
        url: './getPacket',
        data: {
            email: $("#car_email").val(),
            name: $("#car_contact").val(),
            company: $("#car_company").val(),   
            mc_number: $("#car_mc_number").val(),
            cargo: $("#car_cargo_exp").val(),


         },
         success: function(result){
                $("#success-alert-carrier").removeClass('hidden');
                $("#success-alert-carrier").alert();
                $("#success-alert-carrier").text('The packet has been sent!');
                $("#success-alert-carrier").fadeTo(4000, 500).slideUp(500);
              }
    });
});

//EMAIL LOAD INFO TO COLLEAGUE
$(document).on('click', '#sendCarrierInfo', function(){

var car_load_route = $("#car_load_route").val();
var car_current_carrier_rate = $("#car_current_carrier_rate").val();
var car_current_trailer_type = $("#car_current_trailer_type").val();
var car_current_city_location = $("#car_current_city_location").val();
var car_current_miles_from_pick = $("#car_current_miles_from_pick").val();
var car_delivery_schedule = $("#car_delivery_schedule").val();
  
  if(car_load_route === "" || car_current_carrier_rate === "" || car_current_trailer_type === "" || car_current_city_location === "" || car_current_miles_from_pick === "" || car_delivery_schedule === ""){
           $("#error").removeClass('hidden');
           $("#error").alert();
           $("#error").text('All specific load info is required before clicking Email Colleague');
           $("#error").fadeTo(4000, 500).slideUp(500);
           return false;
        }

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


  
$.ajax({
        method: 'POST',
        url: './sendCarrierInfo',
        data: {
            email: $("#car_email").val(),
            name: $("#car_contact").val(),
            company: $("#car_company").val(),   
            mc_number: $("#car_mc_number").val(),
            cargo: $("#car_cargo_exp").val(),
            load_info: $("#car_load_info").val(),
            permanent_notes: $("#car_permanent_notes").val(),
            colleague_email: $("#email_colleague_carrier").val(),
            address: $("#car_address").val(),
            city: $("#car_city").val(),
            state: $("#car_state").val(),
            zip: $("#car_zip").val(),
            phone: $("#car_phone").val(),
            driver_name: $("#car_driver_name").val(),
            driver_phone: $("#car_driver_phone").val(),
            load_route: $("#car_load_route").val(),
            current_carrier_rate: $("#car_current_carrier_rate").val(),
            current_trailer_type: $("#car_current_trailer_type").val(),
            current_city_location: $("#car_current_city_location").val(),
            current_miles_from_pick: $("#car_current_miles_from_pick").val(),
            delivery_schedule: $("#car_delivery_schedule").val(),
            //GET PRETTY MUCH ALL THE INFO NEEDED FOR A ROBUST EMAIL


         },
         success: function(result){
                $("#success-alert-carrier").removeClass('hidden');
                $("#success-alert-carrier").alert();
                $("#success-alert-carrier").text('The load info has been sent!');
                $("#success-alert-carrier").fadeTo(4000, 500).slideUp(500);
              }
    });
});

//Personal Status Table

$(document).ready(function() {



    var table = $('#personal_status').DataTable({
        
         // scrollY:        "800px",
   //       scrollX:        true,
   //       scrollCollapse: true,
   //       paging:         true,
   //       fixedColumns: true,
        "ajax": "/personal_status_table",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, full, meta ) {
                return '<a href="/edit/url?id='+data+'">View</a>';}
            },
            
            { "data": "id" },
            { "data": "pick_status"},
            { "data": "quick_status_notes"},
            { "data": "pick_date"},
            { "data": "pick_time"},
            { "data": "pick_city"},
            { "data": "delivery_date"},
            { "data": "delivery_time"},
            { "data": "delivery_city"},
            { "data": "delivery_status"}


            


        ],
        "order": [[4,'asc'],[5,'asc']],

        "columnDefs": [
      { "width": "20px", "targets": 0 }, //pro # button
      { "width": "20px", "targets": 1 }, //pro #
      { "width": "20px", "targets": 2 }, //pick status 
      { "width": "150px", "targets": 3 }, //short status
      { "width": "25px", "targets": 4 }, //pick date
      { "width": "25px", "targets": 5 }, //pick time
      { "width": "75px", "targets": 6 }, //pick city
      { "width": "25px", "targets": 7 }, //del date
      { "width": "25px", "targets": 8 }, //del time
      { "width": "75px", "targets": 9 }, // del city
      { "width": "20px", "targets": 10 }, // del status

      ]

});   

});

//Personal Status Table Loaded Not Delivered

$(document).ready(function() {



    var table = $('#personal_status_loaded').DataTable({
        
         // scrollY:        "800px",
   //       scrollX:        true,
   //       scrollCollapse: true,
   //       paging:         true,
   //       fixedColumns: true,
        "ajax": "/personal_status_loaded_table",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, full, meta ) {
                return '<a href="/edit/url?id='+data+'">View</a>';}
            },
            
            { "data": "id" },
            { "data": "pick_status"},
            { "data": "quick_status_notes"},
            { "data": "pick_date"},
            { "data": "pick_time"},
            { "data": "pick_city"},
            { "data": "delivery_date"},
            { "data": "delivery_time"},
            { "data": "delivery_city"},
            { "data": "delivery_status"}


            


        ],
        "order": [[4,'asc'],[5,'asc']],

        "columnDefs": [
      { "width": "20px", "targets": 0 }, //pro # button
      { "width": "20px", "targets": 1 }, //pro #
      { "width": "20px", "targets": 2 }, //pick status 
      { "width": "150px", "targets": 3 }, //short status
      { "width": "25px", "targets": 4 }, //pick date
      { "width": "25px", "targets": 5 }, //pick time
      { "width": "75px", "targets": 6 }, //pick city
      { "width": "25px", "targets": 7 }, //del date
      { "width": "25px", "targets": 8 }, //del time
      { "width": "75px", "targets": 9 }, // del city
      { "width": "20px", "targets": 10 }, // del status

      ]

});   

});


$(document).ready(function() {



    var table = $('#mainTableThree').DataTable({
        
         // scrollY:        "800px",
   //       scrollX:        true,
   //       scrollCollapse: true,
   //       paging:         true,
   //       fixedColumns: true,
        "ajax": "/tobedatatwo",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, full, meta ) {
                return '<a href="/edit/url?id='+data+'">View</a>';}
            },
            
            { "data": "id" },
            { "data": "quick_status_notes"},
            { "data": "delivery_date"},
            { "data": "delivery_time"},
            { "data": "carrier_name"},
            { "data": "customer_name"},
            { "data": "pick_city"},
            { "data": "delivery_city"}


        ],
        "order": [[3,'asc'],[4,'asc']],

        "columnDefs": [
      { "width": "20px", "targets": 0 }, //pro # button
      { "width": "20px", "targets": 1 }, //pro #
      { "width": "150px", "targets": 2 }, //status 
      { "width": "50px", "targets": 3 }, //delivery date
      { "width": "25px", "targets": 4 }, //delivery time
      { "width": "75px", "targets": 5 }, //carrier
      { "width": "75px", "targets": 6 }, //customer
      { "width": "50px", "targets": 7 }, //pick city
      { "width": "50px", "targets": 8 }, //delivery city

      ]

});   

});

//GET THE CONTENT FOR THE DATATABLE TO BE LOADED

$(document).ready(function() {

    var table = $('#mainTableTwo').DataTable({
        
         // scrollY:        "800px",
   //       scrollX:        true,
   //       scrollCollapse: true,
   //       paging:         true,
   //       fixedColumns: true,
        "ajax": "/tobedata",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, full, meta ) {
                return '<a href="/edit/url?id='+data+'">View</a>';}
            },
            
            { "data": "id" },
            { "data": "quick_status_notes"},
            { "data": "pick_date"},
            { "data": "pick_time"},
            { "data": "carrier_name"},
            { "data": "customer_name"},
            { "data": "pick_city"},
            { "data": "delivery_city"}


        ],
        "order": [[3,'asc'],[4,'asc']],

        "columnDefs": [
      { "width": "20px", "targets": 0 }, //pro # button
      { "width": "20px", "targets": 1 }, //pro #
      { "width": "150px", "targets": 2 }, //status 
      { "width": "50px", "targets": 3 }, //pick date
      { "width": "25px", "targets": 4 }, //pick time
      { "width": "75px", "targets": 5 }, //carrier
      { "width": "75px", "targets": 6 }, //customer
      { "width": "50px", "targets": 7 }, //pick city
      { "width": "50px", "targets": 8 }, //delivery city

      ]

});   

});


//ACCOUNTS RECEIVABLE

$(document).ready(function() {



    var table = $('#mainTableAccountsReceivable').DataTable({
        
         // scrollY:        "800px",
   //       scrollX:        true,
   //       scrollCollapse: true,
   //       paging:         true,
   //       fixedColumns: true,
        "ajax": "/accountsReceivable",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, full, meta ) {
                return '<a href="/edit/url?id='+data+'">'+data+'</a>';}
            },
            
            
            { "data": "customer_name"},



            
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'customer_id',
                "render": function ( data, type, full, meta ) {
                return '<a href="/customerAccoutingEditFromAccountsReceivablePage/'+data+'">'+data+'</a>';}
            },




            { "data": "amount_due"},
            { "data": "billed_date"},
            { "data": "plus_thirty"},
            { "data": "aging"}


        ],
        "order": [[2,'asc'],[1,'asc']],



       

});   

});

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#mainTableAccountsReceivable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#mainTableAccountsReceivable').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );


//ACCOUNTS RECEIVABLE

$(document).ready(function() {



    var table = $('#mainTableAccountsPayable').DataTable({
        
         // scrollY:        "800px",
   //       scrollX:        true,
   //       scrollCollapse: true,
   //       paging:         true,
   //       fixedColumns: true,
        "ajax": "/accountsPayable",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, full, meta ) {
                return '<a href="/edit/url?id='+data+'">View</a>';}
            },
            
            
            { "data": "id"},
            { "data": "payment_method"},
            { "data": "carrier_name"},



            
            // {
            //     "className":      'details-control',
            //     "orderable":      false,
            //     "data":           'carrier_id',
            //     "render": function ( data, type, full, meta ) {
            //     return '<a href="/carrierAccoutingEditFromAccountsPayablePage/'+data+'">View Carrier</a>';}
            // },




            { "data": "carrier_rate"},
            { "data": "vendor_invoice_date"},
            { "data": "vendor_invoice_number"},
            { "data": "carrierPayStatus"},
            { "data": "plus_thirty"},
            { "data": "aging"}


        ],
        "order": [[2,'asc'],[1,'asc']],



       

});   

});

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#mainTableAccountsPayable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#mainTableAccountsPayable').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );


// JOURNAL ENTRY


$(document).ready(function() {



    var table = $('#journalDatatable1').DataTable({
        
        
        "ajax": "/journalDatatable",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'account_id',
                "render": function ( data, type, full, meta ) {
                return '<a href="/goToAccountProfileFromJournal/'+data+'">Account</a>'}
            },
            
            
            { "data": "created_at"},
            // { "data": "upload_date"},
            // { "data": "invoice_date_journal"},
            { "data": "account_name"},
            { "data": "type"},
            { "data": "type_description"},
            { "data": "type_description_sub"},
            { "data": "memo"},
            { "data": "payment_method"},
            { "data": "payment_number"},
            { "data": "payment_amount"},
            


            { "data": "deposit_amount"},
            

           

            // { "data": "cleared"},
            // { "data": "cleared_date"},
            // { "data": "off_ledger"},


        ],
        "order": [1,'asc'],


        "bDestroy": true
       

});   

// });

// $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#journalDatatable1 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#journalDatatable1').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
});



//GET THE CONTENT FOR THE DATATABLE

$(document).ready(function() {

    var table = $('#mainTable').DataTable({

		 // scrollY:        "800px",
   //       scrollX:        true,
   //       scrollCollapse: true,
   //       paging:         true,
   //       fixedColumns: true,
		"ajax": "/loads",
        "columns": [
			{
                "className":      'details-control',
                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, full, meta ) {
      			return '<a href="/edit/url?id='+data+'">View</a>';}
    		},
			
			{ "data": "id" },
            { "data": "pick_status"},
            { "data": "pick_date"},
            { "data": "pick_time"},
            { "data": "delivery_status"},
            { "data": "delivery_date"},
            { "data": "delivery_time"},
            { "data": "billed_date"},
            { "data": "ref_number"},
            { "data": "customer_name" },
            { "data": "carrier_name" },
            { "data": "pick_company"},
            { "data": "pick_city"},
            { "data": "delivery_company"},
            { "data": "delivery_city"},
            { "data": "po_number"},
            { "data": "bol_number"},
            { "data": "commodity"},
            { "data": "rate_con_creation_date"},
            { "data": "created_by"},
            { "data": "its_group"},
            { "data": "amount_due"},
            { "data": "carrier_rate"},
            { "data": "trailer_type"},
            { "data": "signed_rate_con"},
            { "data": "creation_date" },
            { "data": "pick_state"},
            { "data": "delivery_state"},
            { "data": "rate_con_creator"},
            { "data": "vendor_invoice_number"}


        ],
        "order": [[1,'desc']],

        "columnDefs": [
      { "width": "20px", "targets": 0 }, //pro # button
      { "width": "40px", "targets": 1 }, //pro #
      { "width": "50px", "targets": 2 }, //pick status 
      { "width": "50px", "targets": 3 }, //pick date
      { "width": "25px", "targets": 4 }, //pick time
      { "width": "50px", "targets": 5 }, //delivery status 
      { "width": "50px", "targets": 6 }, //delivery date
      { "width": "25px", "targets": 7 }, //delivery time
      { "width": "50px", "targets": 8 }, //billed date
      { "width": "50px", "targets": 9 }, //reference number
      { "width": "100px", "targets": 10 }, //customer
      { "width": "100px", "targets": 11 }, //carrier
      { "width": "100px", "targets": 12 }, //pick company
      { "width": "100px", "targets": 13 }, //pick city
      { "width": "100px", "targets": 14 }, //delivery company
      { "width": "100px", "targets": 15 }, //delivery city
      { "width": "50px", "targets": 16 }, //po number
      { "width": "50px", "targets": 17 }, //bol number
      { "width": "200px", "targets": 18 }, //commodity
      { "width": "50px", "targets": 19 }, //rate con date
      { "width": "50px", "targets": 20 }, //created by
      { "width": "50px", "targets": 21 }, //group
      { "width": "40px", "targets": 22 }, //amount due
      { "width": "40px", "targets": 23 }, //carrier rate
      { "width": "70px", "targets": 24 }, //trailer type
      { "width": "50px", "targets": 25 }, //signed
      { "width": "50px", "targets": 26 }, //creation date
      { "width": "50px", "targets": 27 }, //pick state
      { "width": "50px", "targets": 28 }, //delivery state
      { "width": "50px", "targets": 29 }, //rate con creator
      { "width": "50px", "targets": 30 } //vendor invoice number
     
    ]

});   

});


//MAKE EACH COLUMN SEARCHABLE AND SORTABLE

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#mainTable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#mainTable').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );


//GET THE CONTENT FOR THE DATATABLE

$(document).ready(function() {

    var table = $('#mainTableFour').DataTable({

     // scrollY:        "800px",
   //       scrollX:        true,
   //       scrollCollapse: true,
   //       paging:         true,
   //       fixedColumns: true,
    "ajax": "/deepLoads",
        "columns": [
      {
                "className":      'details-control',
                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, full, meta ) {
            return '<a href="/edit/url?id='+data+'">View</a>';}
        },
      
      { "data": "id" },
            { "data": "pick_status"},
            { "data": "pick_date"},
            { "data": "pick_time"},
            { "data": "delivery_status"},
            { "data": "delivery_date"},
            { "data": "delivery_time"},
            { "data": "billed_date"},
            { "data": "ref_number"},
            { "data": "customer_name" },
            { "data": "carrier_name" },
            { "data": "pick_company"},
            { "data": "pick_city"},
            { "data": "delivery_company"},
            { "data": "delivery_city"},
            { "data": "po_number"},
            { "data": "bol_number"},
            { "data": "commodity"},
            { "data": "rate_con_creation_date"},
            { "data": "created_by"},
            { "data": "its_group"},
            { "data": "amount_due"},
            { "data": "carrier_rate"},
            { "data": "trailer_type"},
            { "data": "signed_rate_con"},
            { "data": "creation_date" },
            { "data": "pick_state"},
            { "data": "delivery_state"},
            { "data": "rate_con_creator"},
            { "data": "vendor_invoice_number"}


        ],
        "order": [[1,'desc']],

        "columnDefs": [
      { "width": "20px", "targets": 0 }, //pro # button
      { "width": "40px", "targets": 1 }, //pro #
      { "width": "50px", "targets": 2 }, //pick status 
      { "width": "50px", "targets": 3 }, //pick date
      { "width": "25px", "targets": 4 }, //pick time
      { "width": "50px", "targets": 5 }, //delivery status 
      { "width": "50px", "targets": 6 }, //delivery date
      { "width": "25px", "targets": 7 }, //delivery time
      { "width": "50px", "targets": 8 }, //billed date
      { "width": "50px", "targets": 9 }, //reference number
      { "width": "100px", "targets": 10 }, //customer
      { "width": "100px", "targets": 11 }, //carrier
      { "width": "100px", "targets": 12 }, //pick company
      { "width": "100px", "targets": 13 }, //pick city
      { "width": "100px", "targets": 14 }, //delivery company
      { "width": "100px", "targets": 15 }, //delivery city
      { "width": "50px", "targets": 16 }, //po number
      { "width": "50px", "targets": 17 }, //bol number
      { "width": "200px", "targets": 18 }, //commodity
      { "width": "50px", "targets": 19 }, //rate con date
      { "width": "50px", "targets": 20 }, //created by
      { "width": "50px", "targets": 21 }, //group
      { "width": "40px", "targets": 22 }, //amount due
      { "width": "40px", "targets": 23 }, //carrier rate
      { "width": "70px", "targets": 24 }, //trailer type
      { "width": "50px", "targets": 25 }, //signed
      { "width": "50px", "targets": 26 }, //creation date
      { "width": "50px", "targets": 27 }, //pick state
      { "width": "50px", "targets": 28 }, //delivery state
      { "width": "50px", "targets": 29 }, //rate con creator
      { "width": "50px", "targets": 30 } //vendor invoice number
     
    ]

});   

});


//MAKE EACH COLUMN SEARCHABLE AND SORTABLE

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#mainTableFour tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#mainTableFour').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );



//GET THE CONTENT FOR THE DATATABLE

$(document).ready(function() {

    var table = $('#mainTableDeepDeep').DataTable({

     // scrollY:        "800px",
   //       scrollX:        true,
   //       scrollCollapse: true,
   //       paging:         true,
   //       fixedColumns: true,
    "ajax": "/deepDeepLoads",
        "columns": [
      {
                "className":      'details-control',
                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, full, meta ) {
            return '<a href="/edit/url?id='+data+'">View</a>';}
        },
      
      { "data": "id" },
            { "data": "pick_status"},
            { "data": "pick_date"},
            { "data": "pick_time"},
            { "data": "delivery_status"},
            { "data": "delivery_date"},
            { "data": "delivery_time"},
            { "data": "billed_date"},
            { "data": "ref_number"},
            { "data": "customer_name" },
            { "data": "carrier_name" },
            { "data": "pick_company"},
            { "data": "pick_city"},
            { "data": "delivery_company"},
            { "data": "delivery_city"},
            { "data": "po_number"},
            { "data": "bol_number"},
            { "data": "commodity"},
            { "data": "rate_con_creation_date"},
            { "data": "created_by"},
            { "data": "its_group"},
            { "data": "amount_due"},
            { "data": "carrier_rate"},
            { "data": "trailer_type"},
            { "data": "signed_rate_con"},
            { "data": "creation_date" },
            { "data": "pick_state"},
            { "data": "delivery_state"},
            { "data": "rate_con_creator"},
            { "data": "vendor_invoice_number"}


        ],
        "order": [[1,'desc']],

        "columnDefs": [
      { "width": "20px", "targets": 0 }, //pro # button
      { "width": "40px", "targets": 1 }, //pro #
      { "width": "50px", "targets": 2 }, //pick status 
      { "width": "50px", "targets": 3 }, //pick date
      { "width": "25px", "targets": 4 }, //pick time
      { "width": "50px", "targets": 5 }, //delivery status 
      { "width": "50px", "targets": 6 }, //delivery date
      { "width": "25px", "targets": 7 }, //delivery time
      { "width": "50px", "targets": 8 }, //billed date
      { "width": "50px", "targets": 9 }, //reference number
      { "width": "100px", "targets": 10 }, //customer
      { "width": "100px", "targets": 11 }, //carrier
      { "width": "100px", "targets": 12 }, //pick company
      { "width": "100px", "targets": 13 }, //pick city
      { "width": "100px", "targets": 14 }, //delivery company
      { "width": "100px", "targets": 15 }, //delivery city
      { "width": "50px", "targets": 16 }, //po number
      { "width": "50px", "targets": 17 }, //bol number
      { "width": "200px", "targets": 18 }, //commodity
      { "width": "50px", "targets": 19 }, //rate con date
      { "width": "50px", "targets": 20 }, //created by
      { "width": "50px", "targets": 21 }, //group
      { "width": "40px", "targets": 22 }, //amount due
      { "width": "40px", "targets": 23 }, //carrier rate
      { "width": "70px", "targets": 24 }, //trailer type
      { "width": "50px", "targets": 25 }, //signed
      { "width": "50px", "targets": 26 }, //creation date
      { "width": "50px", "targets": 27 }, //pick state
      { "width": "50px", "targets": 28 }, //delivery state
      { "width": "50px", "targets": 29 }, //rate con creator
      { "width": "50px", "targets": 30 } //vendor invoice number
     
    ]

});   

});


//MAKE EACH COLUMN SEARCHABLE AND SORTABLE

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#mainTableDeepDeep tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#mainTableDeepDeep').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );



//GET THE CONTENT FOR THE DATATABLE

$(document).ready(function() {

    var table = $('#generalLedgerTable').DataTable({

     // scrollY:        "800px",
   //       scrollX:        true,
   //       scrollCollapse: true,
   //       paging:         true,
   //       fixedColumns: true,
    "ajax": "/generalLedgerLoads",
        "columns": [
      
            { "data": "date"},
            { "data": "reference_number" },
            { "data": "type_description"},
            

            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'journal_entry_number',
                "render": function ( data, type, full, meta ) 
                {
            
                  if(data !== null)
                    {
                  return '<a href="/journal/'+data+'/edit">'+data+'</a>';
                    }
                    else
                    {
                      return '';
                    }
                }

                },
            

            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'pro_number',
                "render": function ( data, type, full, meta ){
                    
                    if(data !== null)
                    {
                      return '<a href="/edit/url?id='+data+'">'+data+'</a>';
                    }
                    else
                    {
                      return '';
                    }
                }
                  
                  
              
            },
            

          


            { "data": "account_name"},
            { "data": "account_id"},
            { "data": "payment_method"},
            { "data": "cleared"},
            { "data": "cleared_date"},
            { "data": "payment_amount", "className": "payment_amount_color"},
    
            

            { "data": "deposit_amount", "className": "text-success"}
            


        ],
        "order": [[0,'asc']],

        "columnDefs": [
      { "width": "10px", "targets": 0 }, //date
      { "width": "10px", "targets": 1 }, //ref #
      { "width": "25px", "targets": 2 }, //type description
      { "width": "5px", "targets": 3 }, //journal
      { "width": "5px", "targets": 4 }, //pro number
      { "width": "30px", "targets": 5 }, //name
      { "width": "10px", "targets": 6 }, //account id
      { "width": "10px", "targets": 7 }, //method
      { "width": "10px", "targets": 8 }, //cleared
      { "width": "10px", "targets": 9 }, //cleared date
      { "width": "10px", "targets": 10 }, //amount
      { "width": "10px", "targets": 11 }, //deposit amount
      
      
      
     
    ]

     

});


});



//MAKE EACH COLUMN SEARCHABLE AND SORTABLE

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#generalLedgerTable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#generalLedgerTable').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );


//GET THE CONTENT FOR THE DATATABLE

$(document).ready(function() {

    var table = $('#datatableNewChecking').DataTable({


       


     
    "ajax": "/tableNewAccCall",
        "columns": [
      
            { "data": "date"},
            { "data": "reference_number"},

            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, full, meta ){
                    
                    if(data !== undefined)
                    {
                      return '<a href="/edit/url?id='+data+'">'+data+'</a>';
                    }
                    else
                    {
                      return '';
                    }
                }
                  
                  
              
            },

            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'journal_id',
                "render": function ( data, type, full, meta ) 
                {
            
                  if(data !== undefined)
                    {
                  return '<a href="/journal/'+data+'/edit">'+data+'</a>';
                    }
                    else
                    {
                      return '';
                    }
                }

                },

            { "data": "name" },
            { "data": "account_id" },
            { "data": "method" },
            { "data": "type_des" },
            




            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'type',  
                "render": function ( data, type, full, meta ){
                    
                    if(data === 'Debit')
                    {
                      return full.cleared;
                    }
                    else
                    {
                      return '';
                    }
                    
                }
            },
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'type',  
                "render": function ( data, type, full, meta ){
                    
                    if(data === 'Debit')
                    {
                      return full.cleared_date;
                    }
                    else
                    {
                      return '';
                    }
                }
            },









            {
                "className":      'payment_amount_color',
                "orderable":      false,
                "data":           'type',  
                "render": function ( data, type, full, meta ){
                    
                    if(data === 'Debit')
                    {
                      return full.rate;
                    }
                    else
                    {
                      return '';
                    }
                }
            },
            {
                "className":      'text-success',
                "orderable":      false,
                "data":           'type',  
                "render": function ( data, type, full, meta ){
                    
                    if(data === 'Credit')
                    {
                      return full.rate;
                    }
                    else
                    {
                      return '';
                    }
                }
            }
            
            // { "data": "running_total" }

            
            


        ],
        "order": [[0,'asc']],

        "columnDefs": [
      { "width": "10px", "targets": 0 }, //date
      { "width": "10px", "targets": 1 } //ref #
      
      
      
      
     
    ]

     

});


});



//MAKE EACH COLUMN SEARCHABLE AND SORTABLE

$(document).ready(function() {
    
    $('#datatableNewChecking tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );
 
    
    var table = $('#datatableNewChecking').DataTable();
 
    
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
//DATEPICKERS

$('#datepicker').datepicker();

$('#datepicker2').datepicker();

$('#datepicker3').datepicker();

$('#datepicker4').datepicker();

$('#datepicker5').datepicker();

$('#datepicker6').datepicker();

$('#datepicker7').datepicker();

$('#cargo_exp').datepicker();

$('#bc_contract').datepicker();

$('#car_cargo_exp').datepicker();

$('#car_bc_contract').datepicker();

$('#datepicker_profit_start').datepicker();

$('#datepicker_profit_end').datepicker();

$('#datepicker_quickbooks').datepicker();

$('#datepicker_exportCarrierBills').datepicker();

$('#datepicker_snapshot_end').datepicker();

$('#datepicker_snapshot_start').datepicker();

$('#datepicker_delivery_loadlist').datepicker();

$('#datepicker_pick_loadlist').datepicker();

$('#datepicker_search_loadlist').datepicker();

$('#datepicker_deposit_date').datepicker();

$('#datepicker_ach_start').datepicker();

$('#datepicker_ach_end').datepicker();

$('#datepicker_balance_sheet').datepicker();

$('#datepicker_balance_sheet_end').datepicker();

$('#datepicker_type1').datepicker();

$('#datepicker_type2').datepicker();

$('#datepickerPositivePay').datepicker();

$('#datepickerClearedChecks').datepicker();

$('#datepickerClearedChecks2').datepicker();

$('#datepicker_bs_start').datepicker();

$('#datepicker_bs_end').datepicker();

$('#datepickerApprovedCarrierBills').datepicker();

$('#datepickerApprovedCarrierBills2').datepicker();

$('#datepickerPositivePayJournal').datepicker();





$('#datepicker').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker2').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker3').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker4').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker5').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker6').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker7').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#cargo_exp').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#bc_contract').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#car_cargo_exp').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#car_bc_contract').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_profit_start').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_profit_end').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_quickbooks').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_exportCarrierBills').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_snapshot_end').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_snapshot_start').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_delivery_loadlist').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_pick_loadlist').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_search_loadlist').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_deposit_date').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_ach_start').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_ach_end').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_balance_sheet').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_balance_sheet_end').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_type1').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_type2').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepickerPositivePay').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepickerClearedChecks').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepickerClearedChecks2').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_bs_start').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepicker_bs_end').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepickerApprovedCarrierBills').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepickerApprovedCarrierBills2').on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#datepickerPositivePayJournal').on('changeDate', function(ev){
    $(this).datepicker('hide');
});




<!-- INSERT TIMESTAMP IN UPDATE CUSTOMER MESSAGE TEXTAREA -->

<!-- INSERT TIMESTAMP IN UPDATE CUSTOMER MESSAGE TEXTAREA -->

$(document).on('dblclick', '#dialed_out', function(){


$('#dialed_out').val('OutgoingMoreEdits');

});

$(document).on('dblclick', '#update_customer_message', function(){

var d = new Date();
var n = d.toDateString();
var m = d.toLocaleTimeString();

$('#update_customer_message').val($('#update_customer_message').val() + n + " " + m + " - ");

});

$(document).on('dblclick', '#internal_notes', function(){

var d = new Date();
var n = d.toDateString();
var m = d.toLocaleTimeString();

$('#internal_notes').val($('#internal_notes').val() + n + " " + m + " " + user.name + " - ");

});

$(document).on('dblclick', '#notes_on_load', function(){

var d = new Date();
var n = d.toDateString();
var m = d.toLocaleTimeString();

$('#notes_on_load').val($('#notes_on_load').val() + n + " " + m + " " + user.name + " - ");

});

$(document).on('dblclick', '#quick_status_notes', function(){

var d = new Date();
var n = d.getDate();
var m = d.toLocaleTimeString();

$('#quick_status_notes').val($('#quick_status_notes').val() + "Day " + n + " " + m + " " + user.name + " - ");

});

$(document).on('dblclick', '#time_name_stamp', function(){

var d = new Date();
var n = d.toDateString();
var m = d.toLocaleTimeString();

$('#time_name_stamp').val(n + " " + m + " " + user.name);

});

$(document).on('dblclick', '#signed_rate_con', function(){

var signed = 'SIGNED';

$('#signed_rate_con').val(signed);

});

$(document).on('dblclick', '.bid_customer', function(){

var signed = 'United Rentals';

$('.bid_customer').val(signed);

});

<!-- CLEARS OUT CARRIER DATA -->

$(document).on('click', '#clear_carrier', function(){
$('#carrier_name').val('');
$('#carrier_address').val('');
$('#carrier_city').val('');
$('#carrier_state').val('');
$('#carrier_zip').val('');
$('#carrier_contact').val('');
$('#carrier_email').val('');
$('#carrier_phone').val('');
$('#carrier_fax').val('');
$('#carrier_driver_name').val('');
$('#carrier_driver_cell').val('');
$('#carrier_rate').val('');
$('#datepicker').val('');
$('#datepicker2').val('');
$('#datepicker5').val('');
$('#trailer_type').val('Choose');
$('#trailer_for_search').val('Choose');
$('#delivery_status').val('Open');
$('#pick_status').val('Open');
$('#delivery_time').val('0700');
$('#pick_time').val('0700');
$('#quick_status_notes').val('');
$('#datepicker6').val('');
$('#remit_name').val('');
$('#remit_address').val('');
$('#remit_city').val('');
$('#remit_state').val('');
$('#remit_zip').val('');
$('#remit_name_display').text('');
$('#remit_address_display').text('');
$('#remit_citystatezip_display').text('');
$('#carrier_mc').val('');
$('#signed_rate_con').val('');
$('#carrier_id').val('1');
$('#vendor_invoice_number').val('');
$('#datepicker3').val('');
$('#payment_method').val('Choose');
$('#billed_date').val('');
$('#rate_con_creation_date').val('');


});



<!-- TAKES THE PICK ZIP AND FINDS THE COORESPONDING CITY, STATE AND PUTS THEM IN THE INPUT FIELDS -->

$(document).ready(function(){
  $('#pick_zip_loadlist_search').keyup(function() {
    var zipCode = $(this).val();
      if(zipCode.length === 5 && $.isNumeric(zipCode)) {


     $.ajax({
      type: "GET",
      beforeSend: function(request) {
        request.setRequestHeader("x-key", "7fdf923c5fb9dccddad8bdd98b828933e801fd73");
      },
      url: "https://zip.getziptastic.com/v3/US/"+zipCode,
      success: function(data) {
        //console.log(data[0].city);
    $("#pick_city").val(data[0].city);
    $("#pick_state").val(data[0].state_short);
      }
    });

  }

 });
  });

<!-- END -->

<!-- TAKES THE DELIVERY ZIP AND FINDS THE COORESPONDING CITY, STATE AND PUTS THEM IN THE INPUT FIELDS, PULLS UP GOOGLE MAP ROUTE, PUTS MILEAGE IN THE INPUT FIELD -->

$(document).ready(function(){
  $('#delivery_zip_loadlist_search').keyup(function() {
    var zipCode = $(this).val();
      if(zipCode.length === 5 && $.isNumeric(zipCode)) {


     $.ajax({
      type: "GET",
      beforeSend: function(request) {
        request.setRequestHeader("x-key", "7fdf923c5fb9dccddad8bdd98b828933e801fd73");
      },
      url: "https://zip.getziptastic.com/v3/US/"+zipCode,
      success: function(data) {
        //console.log(data[0].city);
    $("#delivery_city").val(data[0].city);
    $("#delivery_state").val(data[0].state_short);


    var pick_city = $("#pick_city").val();
    var pick_state = $("#pick_state").val();
    var delivery_city = $("#delivery_city").val();
    var delivery_state = $("#delivery_state").val();

    // $('#loadlist_map_display').html("<iframe class='center-block' width='100%' height='400' frameborder='5' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?f=d&amp;source=s_d&amp;saddr="+pick_city+","+pick_state+"&amp;daddr="+delivery_city+","+delivery_state+"&amp;hl=en&amp;geocode=FWICfwIdGuDG-inty_TQPCwOiDEAwMAJrabgrw%3BFbpmTQIdlKqf-in5ju36qbTYhzFb4Lsiyuo5vg&amp;aq=&amp;sll=40.00132,-82.909012&amp;sspn=0.397649,0.98053&amp;mra=ls&amp;ie=UTF8&amp;t=m&amp;ll=40.25279,-88.91443&amp;spn=3.250649,2.569472&amp;output=embed'></iframe>");


$('#new_loadlist_map_display').html("<iframe class='center-block' width='100%' height='400' frameborder='5' scrolling='no' marginheight='0' marginwidth='0' src='https://www.google.com/maps/embed/v1/directions?key=AIzaSyBsrHsyaDhAw8CupGAEd_6M3hnPjO89mQ8&origin="+pick_city+","+pick_state+"&destination="+delivery_city+","+delivery_state+"&mode=driving&units=imperial'></iframe>");

    //code block

    var location1;
  var location2;
  var address1 = pick_city + "," + pick_state;
  var address2 = delivery_city + "," + delivery_state;
  var geocoder;
  //var map;
  var distance;



    geocoder = new google.maps.Geocoder(); //  creating a new geocode object

      }
    });

  }

 });
  });

<!-- END - TAKES THE DELIVERY ZIP AND FINDS THE COORESPONDING CITY, STATE AND PUTS THEM IN THE INPUT FIELDS, PULLS UP GOOGLE MAP ROUTE, PUTS MILEAGE IN THE INPUT FIELD -->


$(document).on('click', '#loadlist_map', function(){

var pick_city = $("#pick_city").val();
var pick_state = $("#pick_state").val();
var delivery_city = $("#delivery_city").val();
var delivery_state = $("#delivery_state").val();



$('#new_loadlist_map_display').html("<iframe class='center-block' width='100%' height='400' frameborder='5' scrolling='no' marginheight='0' marginwidth='0' src='https://www.google.com/maps/embed/v1/directions?key=AIzaSyBsrHsyaDhAw8CupGAEd_6M3hnPjO89mQ8&origin="+pick_city+","+pick_state+"&destination="+delivery_city+","+delivery_state+"&mode=driving&units=imperial'></iframe>");


});

$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});

$(document).ready(function(){
    $(".loadlist_row").hover(function(){
        $(this).css("background-color", "#C3E3FF");
        }, function(){
        $(this).css("background-color", "");
    });
});


$(document).ready(function(){

$("#miles_loadlist").mouseover(function(){

 
  var myString = $('#miles').val();

  var fifty_cent = Math.ceil((myString * .50));
        var sixty_five_cent = Math.ceil((myString * .65));
        var seventy_five_cent = Math.ceil((myString * .75));
        var ninety_cent = Math.ceil((myString * .90));
        var dollar_ten = Math.ceil((myString * 1.10));
        var dollar_twenty_five = Math.ceil((myString * 1.25));
        var dollar_thirty_five = Math.ceil((myString * 1.35));
        var dollar_fifty = Math.ceil((myString * 1.50));
        var dollar_sixty_five = Math.ceil((myString * 1.65));
        var dollar_seventy_five = Math.ceil((myString * 1.75));
        var dollar_eighty_five = Math.ceil((myString * 1.85));
        var dollar_ninety_five = Math.ceil((myString * 1.95));
        var two_even = Math.ceil((myString * 2));
        var two_fifteen = Math.ceil((myString * 2.15));
        var two_twenty_five = Math.ceil((myString * 2.25));
        var two_thirty_five = Math.ceil((myString * 2.35));
        var two_fifty = Math.ceil((myString * 2.50));
        var two_sevety_five = Math.ceil((myString * 2.75));
        var three_even = Math.ceil((myString * 3));
        var three_twenty_five = Math.ceil((myString * 3.25));
        var three_fifty = Math.ceil((myString * 3.50));
        var three_seventy_five = Math.ceil((myString * 3.75));
        var four_even = Math.ceil((myString * 4));
        var four_twenty_five = Math.ceil((myString * 4.25));
        var four_fifty = Math.ceil((myString * 4.50));
        var four_seventy_five = Math.ceil((myString * 4.75));
        var five_even = Math.ceil((myString * 5));
        var five_twenty_five = Math.ceil((myString * 5.25));
        var five_fifty = Math.ceil((myString * 5.50));
        var five_seventy_five = Math.ceil((myString * 5.75));


        $('#mile_calc').html("<ul class='calc'><li><b>.50</b> per mile = $" + fifty_cent + "</li><li><b>.65</b> per mile = $" + sixty_five_cent + "</li><li><b>.75</b> per mile = $" + seventy_five_cent + "</li><li><b>.90</b> per mile = $" + ninety_cent + "</li><li><b>1.10</b> per mile = $" + dollar_ten + "</li><li><b>1.25</b> per mile = $" + dollar_twenty_five + "</li><li><b>1.35</b> per mile = $" + dollar_thirty_five + "</li><li><b>1.50</b> per mile = $" + dollar_fifty + "</li><li><b>1.65</b> per mile = $" + dollar_sixty_five + "</li><li><b>1.75</b> per mile = $" + dollar_seventy_five + "</li><li><b>1.85</b> per mile = $" + dollar_eighty_five + "</li><li><b>1.95</b> per mile = $" + dollar_ninety_five + "</li><li><b>2.00</b> per mile = $" + two_even + "</li><li><b>2.15</b> per mile = $" + two_fifteen + "</li><li><b>2.25</b> per mile = $" + two_twenty_five + "</li><li><b>2.35</b> per mile = $" + two_thirty_five + "</li><li><b>2.50</b> per mile = $" + two_fifty + "</li><li><b>2.75</b> per mile = $" + two_sevety_five + "</li><li><b>3.00</b> per mile = $" + three_even + "</li><li><b>3.25</b> per mile = $" + three_twenty_five + "</li><li><b>3.50</b> per mile = $" + three_fifty + "</li><li><b>3.75</b> per mile = $" + three_seventy_five + "</li><li><b>4.00</b> per mile = $" + four_even + "</li><li><b>4.25</b> per mile = $" + four_twenty_five + "</li><li><b>4.50</b> per mile = $" + four_fifty + "</li><li><b>4.75</b> per mile = $" + four_seventy_five + "</li><li><b>5.00</b> per mile = $" + five_even + "</li><li><b>5.25</b> per mile = $" + five_twenty_five + "</li><li><b>5.50</b> per mile = $" + five_fifty + "</li><li><b>5.75</b> per mile = $" + five_seventy_five + "</li></ul>");



});



$("#miles_loadlist").mouseleave(function(){
        $("#mile_calc").empty();
    });

 });



$(document).on('click', '#dot_number_find', function()

{
  var dotNumber = $('#dot_number').val();

      $.ajax({
        type: "GET",
        url: "https://mobile.fmcsa.dot.gov/qc/services/carriers/" + dotNumber + "?webKey=6cff17b7a7de3e02e765ea6c85eef20a8f11c4a1",
        success: function(data) {

                          $("#company").val(data.content.carrier.legalName);
                          $("#address").val(data.content.carrier.phyStreet);
                          $("#city").val(data.content.carrier.phyCity);
                          $("#state").val(data.content.carrier.phyState);
                          $("#zip").val(data.content.carrier.phyZipcode);
                          $("#phone").val(data.content.carrier.phone);

                          $("#oos_driver_national").val(data.content.carrier.driverOosRateNationalAverage);
                          $("#oos_driver_company").val(Math.round(data.content.carrier.driverOosRate));
                          $("#oos_vehicle_national").val(data.content.carrier.vehicleOosRateNationalAverage);
                          $("#oos_vehicle_company").val(Math.round(data.content.carrier.vehicleOosRate));

                          $("#allowed_to_operate").val(data.content.carrier.allowedToOperate);
                          $("#operation_type").val(data.content.carrier.carrierOperation.carrierOperationDesc);

                          $("#crashes").val(data.content.carrier.crashTotal);
                          $("#fatal_crashes").val(data.content.carrier.fatalCrash);

                          $("#number_of_drivers").val(data.content.carrier.totalDrivers);
                          $("#number_of_power").val(data.content.carrier.totalPowerUnits);

                          

                          
                          var dt = new Date();
                          var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

                          

                          var month = dt.getMonth()+1;
                          var day = dt.getDate();

                          var output = dt.getFullYear() + '/' +
                          ((''+month).length<2 ? '0' : '') + month + '/' +
                          ((''+day).length<2 ? '0' : '') + day;


                          $("#fmcsa_time").val(time + ' ' + output);


                          }

      }); //end first ajax

$.ajax({
  type: "GET",
  url: "https://mobile.fmcsa.dot.gov/qc/services/carriers/" + dotNumber + "/basics?webKey=6cff17b7a7de3e02e765ea6c85eef20a8f11c4a1",

  success: function(data) {

                               $("#safety_1").text(data.content[0].basic.basicsType.basicsCode + " serious violation past 12 months: " +

                                  data.content[0].basic.seriousViolationFromInvestigationPast12MonthIndicator

                                );

                              $("#safety_2").text(data.content[1].basic.basicsType.basicsCode + " serious violation past 12 months: " +

                                  data.content[1].basic.seriousViolationFromInvestigationPast12MonthIndicator

                                );
                              $("#safety_3").text(data.content[2].basic.basicsType.basicsCode + " serious violation past 12 months: " +

                                  data.content[2].basic.seriousViolationFromInvestigationPast12MonthIndicator

                                );
                              $("#safety_4").text(data.content[3].basic.basicsType.basicsCode + " serious violation past 12 months: " +

                                  data.content[3].basic.seriousViolationFromInvestigationPast12MonthIndicator

                                );
                              $("#safety_5").text(data.content[4].basic.basicsType.basicsCode + " serious violation past 12 months: " +

                                  data.content[4].basic.seriousViolationFromInvestigationPast12MonthIndicator

                                );
                          
                          
                          }


 });


 });



$(document).on('click', '#DisplaySafetyInfo', function()

{
  var dotNumber = $('#car_dot_number').val();

     
$.ajax({
  type: "GET",
  url: "https://mobile.fmcsa.dot.gov/qc/services/carriers/" + dotNumber + "/basics?webKey=6cff17b7a7de3e02e765ea6c85eef20a8f11c4a1",

  success: function(data) {

                               $("#safety_1").text(data.content[0].basic.basicsType.basicsCode + " serious violation past 12 months: " +

                                  data.content[0].basic.seriousViolationFromInvestigationPast12MonthIndicator

                                );

                              $("#safety_2").text(data.content[1].basic.basicsType.basicsCode + " serious violation past 12 months: " +

                                  data.content[1].basic.seriousViolationFromInvestigationPast12MonthIndicator

                                );
                              $("#safety_3").text(data.content[2].basic.basicsType.basicsCode + " serious violation past 12 months: " +

                                  data.content[2].basic.seriousViolationFromInvestigationPast12MonthIndicator

                                );
                              $("#safety_4").text(data.content[3].basic.basicsType.basicsCode + " serious violation past 12 months: " +

                                  data.content[3].basic.seriousViolationFromInvestigationPast12MonthIndicator

                                );
                              $("#safety_5").text(data.content[4].basic.basicsType.basicsCode + " serious violation past 12 months: " +

                                  data.content[4].basic.seriousViolationFromInvestigationPast12MonthIndicator

                                );


                          
                          
                          }


 });


$.ajax({
        type: "GET",
        url: "https://mobile.fmcsa.dot.gov/qc/services/carriers/" + dotNumber + "?webKey=6cff17b7a7de3e02e765ea6c85eef20a8f11c4a1",
        success: function(data) {

                          
                              $("#more_safety_info").text(

                            "DBA NAME: " + data.content.carrier.dbaName +
                            " -- ALLOWED TO OPERATE: " + data.content.carrier.allowedToOperate +
                            " -- OPERATION: " + data.content.carrier.carrierOperation.carrierOperationDesc +
                            " -- CRASH TOTAL: " + data.content.carrier.crashTotal +
                            " -- DRIVER OOS FROM INSPECTION: " + data.content.carrier.driverOosInsp +
                            " -- VEHILCE OOS FROM INSPECTION: " + data.content.carrier.vehicleOosInsp



                            );
                          



                          }

      }); //end first ajax



 });

$(document).on('click', '#OverwriteExistingInfo', function()

{
  var dotNumber = $('#car_dot_number').val();

     $.ajax({
        type: "GET",
        url: "https://mobile.fmcsa.dot.gov/qc/services/carriers/" + dotNumber + "?webKey=6cff17b7a7de3e02e765ea6c85eef20a8f11c4a1",
        success: function(data) {

                          $("#car_company").val(data.content.carrier.legalName);
                          $("#car_address").val(data.content.carrier.phyStreet);
                          $("#car_city").val(data.content.carrier.phyCity);
                          $("#car_state").val(data.content.carrier.phyState);
                          $("#car_zip").val(data.content.carrier.phyZipcode);
                          $("#car_phone").val(data.content.carrier.phone);
                          $("#car_permanent_notes").val(

                            "DBA NAME: " + data.content.carrier.dbaName +
                            " -- ALLOWED TO OPERATE: " + data.content.carrier.allowedToOperate +
                            " -- OPERATION: " + data.content.carrier.carrierOperation.carrierOperationDesc +
                            " -- CRASH TOTAL: " + data.content.carrier.crashTotal +
                            " -- DRIVER OOS FROM INSPECTION: " + data.content.carrier.driverOosInsp +
                            " -- VEHILCE OOS FROM INSPECTION: " + data.content.carrier.vehicleOosInsp



                            );
                          



                          }

      }); //end first ajax



 });

function googleCarrier(carrier) {

    window.open("https://www.google.com/#q=" + carrier);

    
}

function fmcsaCarrier(carrier) {

    window.open("https://ai.fmcsa.dot.gov/SMS/Carrier/" + carrier + "/Overview.aspx");

    
}

$(document).on('click', '#push_to_remit', function(){


var company = $('#company').val();
var address = $('#address').val();
var city = $('#city').val();
var state = $('#state').val();
var zip = $('#zip').val();

$('#remit_name').val(company);
$('#remit_address').val(address); 
$('#remit_city').val(city); 
$('#remit_state').val(state); 
$('#remit_zip').val(zip); 

});

$(document).on('click', '#new_carrier_fmcsa', function(){


var dot_number = $('#dot_number').val();

window.open("https://ai.fmcsa.dot.gov/SMS/Carrier/" + dot_number + "/Overview.aspx");

});





//# sourceMappingURL=main.js.map
