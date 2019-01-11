@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    
    <script src="/js/main.js"></script>
    
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>

@section('content')

 <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    



    <div class="row">
        <div class="col-md-12">

            {!! Form::open(['route' => 'journal.creditCardStore']) !!}
                @include('partials.creditCardForm', ['submitButtonText' => 'New Entry'])
            {!! Form::close() !!}
 

 
        </div>

        </div>

<script src="/js/datepicker.js"></script>
<script>
$(function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
            $( "#vendorSearchJournal" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/carrier/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: '--NAME-- ' + item.company + ' --ACCOUNT ID-- ' + item.id,
                                    value: item.company,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.carrierRecord = ui;
                    $('#account_name').val(window.carrierRecord.item.object.company);
                    $('#account_id').val(window.carrierRecord.item.object.id);
                    
                    

                    log( ui.item ?
                    "Selected: " + ui.item.label :
                    "Nothing selected, input was " + this.value);
                                        $('#vendorSearchJournal').val('test');

                },
                open: function() {
                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );

                },
                close: function() {
                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                }
            });




        });
$(function() {
$('#invoice_date_journal').datepicker();
  $('#invoice_date_journal').on('changeDate', function(ev){
    $(this).datepicker('hide');
});
  });
</script>
@endsection