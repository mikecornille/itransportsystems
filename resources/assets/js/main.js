// SENDS THE INFO TO THE CUSTOMER MODAL FOR EDITING
function goToCustomerEditPage() {
  $('#name').val(window.customerRecord.item.object.name);
  $('#location_number').val(window.customerRecord.item.object.location_number);
  $('#address').val(window.customerRecord.item.object.address);
  $('#city').val(window.customerRecord.item.object.city);
  $('#state').val(window.customerRecord.item.object.state);
  $('#zip').val(window.customerRecord.item.object.zip);
  $('#fax').val(window.customerRecord.item.object.fax);
  $('#name_1').val(window.customerRecord.item.object.name_1);
  $('#phone_1').val(window.customerRecord.item.object.phone_1);
  $('#email_1').val(window.customerRecord.item.object.email_1);
  $('#name_2').val(window.customerRecord.item.object.name_2);
  $('#phone_2').val(window.customerRecord.item.object.phone_2);
  $('#email_2').val(window.customerRecord.item.object.email_2);
  $('#name_3').val(window.customerRecord.item.object.name_3);
  $('#phone_3').val(window.customerRecord.item.object.phone_3);
  $('#email_3').val(window.customerRecord.item.object.email_3);
  $('#name_4').val(window.customerRecord.item.object.name_4);
  $('#phone_4').val(window.customerRecord.item.object.phone_4);
  $('#email_4').val(window.customerRecord.item.object.email_4);
  $('textarea#internal_notes').val(window.customerRecord.item.object.internal_notes);
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
            name_1: $("#name_1").val(),
            phone_1: $("#phone_1").val(),
            email_1: $("#email_1").val(),
            name_2: $("#name_2").val(),
            phone_2: $("#phone_2").val(),
            email_2: $("#email_2").val(),
            name_3: $("#name_3").val(),
            phone_3: $("#phone_3").val(),
            email_3: $("#email_3").val(),
            name_4: $("#name_4").val(),
            phone_4: $("#phone_4").val(),
            email_4: $("#email_4").val(),
            internal_notes: $("#internal_notes").val(),

         },
    });
});
// END NOTES


// SENDS THE INFO TO THE ORIGIN MODAL FOR EDITING
function goToOriginEditPage() {
  $('#location_name').val(window.originRecord.item.object.location_name);
  $('#location_number').val(window.originRecord.item.object.location_number);
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


//GETS THE VALUES FROM THE CUSTOMER MODAL AND SUBMITS THEM TO COORESPONDING ID IN DATABASE
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
            location_number: $("#location_number").val(),   
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
    });
});
//END NOTES



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
            { "data": "pick_date"},
            { "data": "pick_time"},
            { "data": "customer_name"},
            { "data": "pick_city"},
            { "data": "delivery_city"}


        ],
        "order": [[3,'asc'],[4,'asc']],

        "columnDefs": [
      { "width": "20px", "targets": 0 }, //pro # button
      { "width": "20px", "targets": 1 }, //pro #
      { "width": "100px", "targets": 2 }, //status 
      { "width": "50px", "targets": 3 }, //pick date
      { "width": "25px", "targets": 4 }, //pick time
      { "width": "100px", "targets": 5 }, //customer
      { "width": "50px", "targets": 6 }, //pick city
      { "width": "50px", "targets": 7 }, //delivery city

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
            { "data": "customer_name"},
            { "data": "pick_city"},
            { "data": "delivery_city"}


        ],
        "order": [[3,'asc'],[4,'asc']],

        "columnDefs": [
      { "width": "20px", "targets": 0 }, //pro # button
      { "width": "20px", "targets": 1 }, //pro #
      { "width": "100px", "targets": 2 }, //status 
      { "width": "50px", "targets": 3 }, //pick date
      { "width": "25px", "targets": 4 }, //pick time
      { "width": "100px", "targets": 5 }, //customer
      { "width": "50px", "targets": 6 }, //pick city
      { "width": "50px", "targets": 7 }, //delivery city

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

$('#datepicker').datepicker()

$('#datepicker2').datepicker()

$('#datepicker3').datepicker()

$('#datepicker4').datepicker()

$('#datepicker5').datepicker()

$('#datepicker6').datepicker()

$('#datepicker7').datepicker()

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

$('#internal_notes').val($('#internal_notes').val() + n + " " + m + " - ");

});

$(document).on('dblclick', '#quick_status_notes', function(){

var d = new Date();
var n = d.getDate();
var m = d.toLocaleTimeString();

$('#quick_status_notes').val($('#quick_status_notes').val() + "Day " + n + " " + m + " - ");

});

$(document).on('dblclick', '#total_miles', function(){

var signed = 'SIGNED';

$('#total_miles').val(signed);

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