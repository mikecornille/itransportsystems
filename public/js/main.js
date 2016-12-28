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
            { "data": "creation_date" }


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
      { "width": "50px", "targets": 26 } //creation date
     
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


<!-- INSERT TIMESTAMP IN UPDATE CUSTOMER MESSAGE TEXTAREA -->

<!-- INSERT TIMESTAMP IN UPDATE CUSTOMER MESSAGE TEXTAREA -->

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

$(document).on('dblclick', '#quick_status_notes', function(){

var d = new Date();
var n = d.getDate();
var m = d.toLocaleTimeString();

$('#quick_status_notes').val($('#quick_status_notes').val() + "Day " + n + " " + m + " " + user.name + " - ");

});

$(document).on('dblclick', '#signed_rate_con', function(){

var signed = 'SIGNED';

$('#signed_rate_con').val(signed);

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
$('#trailer_type').val('Please Choose One');
$('#delivery_status').val('Open');
$('#pick_status').val('Open');
$('#delivery_time').val('0700');
$('#pick_time').val('0700');
//$('#factoring_company').val('');
$('#quick_status_notes').val('');
$('#datepicker6').val('');
$('#datepicker7').val('');
// $('#remit_name').val('');
// $('#remit_address').val('');
// $('#remit_city').val('');
// $('#remit_state').val('');
// $('#remit_zip').val('');
// $('#remit_to_name').text('');
// $('#remit_to_address').text('');
// $('#remit_to_citystatezip').text('');
// $('#vendor_invoice_number').val('');
// $('#vendor_invoice_date').val('');
$('#total_miles').val('');


});
//# sourceMappingURL=main.js.map
