@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    
    <script src="/js/main.js"></script>
    
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
@section('content')

<!-- <div class="container"> -->


        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    



    <div class="row">
        <div class="col-md-12">

            {!! Form::open(['route' => 'journal.store']) !!}
                @include('partials.journalForm', ['submitButtonText' => 'New Journal Entry'])
            {!! Form::close() !!}

        </div>

        </div>
             
  <table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th>Created</th>
        <th>Check Print</th>
        <th>Invoice Date</th>
        <th>Account</th>
        <th>Account ID #</th>
        <th>Type</th>
        <th>Description</th>
        <th>Sub Desc</th>
        <th>Reference #</th>
        <th>Memo</th>
        <th>Payment Method</th>
        <th>Payment Number</th>
        <th>Payment Amount</th>
        <th>Deposit Amount</th>
        <th>Cleared</th>
        <th>Cleared Date</th>
      </tr>
    </thead>
    <tbody>
    @foreach($journal_entries as $entry)
      <tr>
        <td></td>
        <td>{{ $entry->created_at }}</td>
        <td>{{ $entry->upload_date }}</td>
        <td>{{ $entry->invoice_date_journal }}</td>
        <td>{{ $entry->account_name }}</td>
        <td><a href="{{ URL::to('/goToAccountProfileFromJournal/' . $entry->account_id) }}">{{ $entry->account_id }}</a></td>
        <td>{{ $entry->type }}</td>
        <td>{{ $entry->type_description }}</td>
        <td>{{ $entry->type_description_sub }}</td>
        <td>{{ $entry->reference_number }}</td>
        <td><a href="#" class="inactiveLink" title="Memo" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $entry->memo }}">{{ substr($entry->memo, 0, 25) }} {{ strlen($entry->memo) > 25 ? "..." : "" }}</a></td>
        <td>{{ $entry->payment_method }}</td>
        <td>{{ $entry->payment_number }}</td>
        <td>{{ $entry->payment_amount }}</td>
        <td>{{ $entry->deposit_amount }}</td>
        <td>{{ $entry->cleared }}</td>
        <td>{{ $entry->cleared_date }}</td>
        <td>{!! Html::linkRoute('journal.edit', 'Edit', array($entry->id), ['class' => 'btn btn-success btn-block']) !!}</td>
      </tr>
      @endforeach
      
    </tbody>
  </table>

<!-- </div> -->
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