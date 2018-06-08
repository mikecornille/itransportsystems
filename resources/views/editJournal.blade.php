@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-8">
        {!! Form::model($post, ['route' => ['journal.update', $post->id], 'method' => 'PUT']) !!}
            @include('partials.journalForm', ['submitButtonText' => 'Update Entry'])
        {!! Form::close() !!}
    </div>
    <div class="row">
        <div class="col-md-4">
            <form role="form" class="form-horizontal" method="POST" action="/journalAccountSearchEdit">
                {{ csrf_field() }}
                <input type="hidden" id="findJournalAccountsId" name="findJournalAccountsId" value="{{ $post->account_id }}">
                <button style="margin-top: 15px;" type="submit" class="btn btn-warning" id="findJournalAccountsSubmit"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back to Profile</button>
            </form>
        </div>
        <div style="margin-top: 15px;" class="col-md-4">
            {!! Html::linkRoute('journal.index', 'New Journal Entry', array(), ['class' => 'btn btn-warning btn-block']) !!}
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