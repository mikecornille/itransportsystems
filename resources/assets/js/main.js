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
        
		 scrollY:        "300px",
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
      			return '<a href="/edit/url?id='+data+'">EDIT</a>';}
    		},
			
			{ "data": "pick_city" },
            { "data": "pick_state" },
            { "data": "delivery_city" },
            { "data": "delivery_state" },
            { "data": "tmanum" },
            { "data": "ponumber" },
            { "data": "miles" },
			{ "data": "pick_date" },
            { "data": "del_date" },
            { "data": "load_type" },
            { "data": "commodity" },
            { "data": "urgency" },
            { "data": "billing" },
            { "data": "special_instructions" },

            {
                "className":      'details-control',
                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, full, meta ) {
      			return '<a href="/delete/url?id='+data+'">DELETE</a>';}
            	 }


        ],
        "order": [[0,'desc']],

});   

});


//MAKE EACH COLUMN SEARCHABLE AND SORTABLE

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#myTable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#myTable').DataTable();
 
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