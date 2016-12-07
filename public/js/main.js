//DISABLE THE ENTER BUTTON ON KEYBOARDS

// $('html').bind('keypress', function(e)
// 	{
//    		if(e.keyCode == 13)
//    			{
//       			return false;
//    			}
// 	});

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
            { "data": "total_miles"},
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
//# sourceMappingURL=main.js.map
