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
            { "data": "creation_date" },
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
            { "data": "total_miles"}


        ],
        "order": [[1,'desc']],

        "columnDefs": [
      { "width": "20px", "targets": 0 }, //pro # button
      { "width": "40px", "targets": 1 }, //pro #
      { "width": "50px", "targets": 2 }, //creation date
      { "width": "50px", "targets": 3 }, //pick status 
      { "width": "50px", "targets": 4 }, //pick date
      { "width": "25px", "targets": 5 }, //pick time
      { "width": "50px", "targets": 6 }, //delivery status 
      { "width": "50px", "targets": 7 }, //delivery date
      { "width": "25px", "targets": 8 }, //delivery time
      { "width": "50px", "targets": 9 }, //billed date
      { "width": "50px", "targets": 10 }, //reference number
      { "width": "100px", "targets": 11 }, //customer
      { "width": "100px", "targets": 12 }, //carrier
      { "width": "100px", "targets": 13 }, //pick company
      { "width": "100px", "targets": 14 }, //pick city
      { "width": "100px", "targets": 15 }, //delivery company
      { "width": "100px", "targets": 16 }, //delivery city
      { "width": "50px", "targets": 17 }, //po number
      { "width": "50px", "targets": 18 }, //bol number
      { "width": "200px", "targets": 19 }, //commodity
      { "width": "50px", "targets": 20 }, //rate con date
      { "width": "50px", "targets": 21 }, //created by
      { "width": "50px", "targets": 22 }, //group
      { "width": "40px", "targets": 23 }, //amount due
      { "width": "40px", "targets": 24 }, //carrier rate
      { "width": "70px", "targets": 25 }, //trailer type
      { "width": "50px", "targets": 26 } //signed
     
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
//# sourceMappingURL=main.js.map
