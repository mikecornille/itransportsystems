//DISABLE THE ENTER BUTTON ON KEYBOARDS

$('html').bind('keypress', function(e)
	{
   		if(e.keyCode == 13)
   			{
      			return false;
   			}
	});

//GET THE CONTENT FOR THE DATATABLE

$(document).ready(function() {

    var table = $('#mainTable').DataTable({
        
		 scrollY:        "800px",
         scrollX:        true,
         scrollCollapse: true,
         paging:         true,
         fixedColumns: true,
		"ajax": "/loads",
        "columns": [
			{
                "className":      'details-control',
                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, full, meta ) {
      			return '<a href="/edit/url?id='+data+'">Edit/View</a>';}
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
        "order": [[0,'desc']],

});   

});


//MAKE EACH COLUMN SEARCHABLE AND SORTABLE

// $(document).ready(function() {
//     // Setup - add a text input to each footer cell
//     $('#mainTable tfoot th').each( function () {
//         var title = $(this).text();
//         $(this).html( '<input type="text" placeholder="'+title+'" />' );
//     } );
 
//     // DataTable
//     var table = $('#mainTable').DataTable();
 
//     // Apply the search
//     table.columns().every( function () {
//         var that = this;
 
//         $( 'input', this.footer() ).on( 'keyup change', function () {
//             if ( that.search() !== this.value ) {
//                 that
//                     .search( this.value )
//                     .draw();
//             }
//         } );
//     } );
// } );



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

// $(document).on('dblclick', '#quick_status_notes', function(){

// var d = new Date();
// var n = d.getDate();
// var m = d.toLocaleTimeString();

// $('#quick_status_notes').val($('#quick_status_notes').val() + 'Day ' n + ' ' + m + " - ");

// });

$(document).on('dblclick', '#signed_rate_con', function(){

var signed = 'SIGNED';

$('#signed_rate_con').val(signed);

});
//# sourceMappingURL=main.js.map
