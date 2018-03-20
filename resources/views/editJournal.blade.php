@extends('layouts.app')

@section('content')

<div class="container">


         <div class="row">
        <div class="col-md-8">
            {!! Form::model($post, ['route' => ['journal.update', $post->id], 'method' => 'PUT']) !!}
                @include('partials.journalForm', ['submitButtonText' => 'Update Journal'])
            {!! Form::close() !!}
        </div>

        <div class="col-md-4">
            

            {!! Html::linkRoute('journal.index', 'Back', array(), ['class' => 'btn btn-warning btn-block']) !!}
        </div>
    </div>
             
  

</div>

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
                                    label: '--NAME-- ' + item.company + '--CONTACT-- ' + item.contact + ' --ADDRESS-- ' + item.address + ' --EMAIL-- ' + item.email,
                                    value: item.company + ' ' + item.address,
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
</script>
@endsection