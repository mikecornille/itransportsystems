@extends('layouts.app')

@section('content')


<h1 class="text-center">General Ledger</h1>


    <div class="well">
        <div class="row">
            <div class="col-md-3">
                <h2>Target Type</h2>
                    <form role="form" class="form-horizontal" method="POST" action="/generalLedgerTargetType/xlsx">

                        {{ csrf_field() }}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <label class="label-control" for="start_date">Start Date</label>
                                        <input type="text" class="form-control" id="datepicker_type1" name="start_date">
                                    </div>
                                    <div class="col-xs-4">
                                        <label class="label-control" for="end_date">End Date</label>
                                        <input type="text" class="form-control" id="datepicker_type2" name="end_date">
                                    </div>
                                     <div class="col-xs-4">
                                        <label class="label-control" for="type_selected">Type</label>
                                        <select class="form-control" id="type_selected" name="type_selected">
                                          <option value="PMT">PMT</option>
                                          <option value="BILLPMT">BILLPMT</option>
                                          <option value="GENJRN">GENJRN</option>
                                        </select>
                                    </div>
                                </div>

                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>
                            </div>
                    </form>
            </div>
            <div class="col-md-3">
                <h2>All Data Excel</h2>
                    <form role="form" class="form-horizontal" method="POST" action="/generalLedgerExcel/xlsx">

                        {{ csrf_field() }}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label class="label-control" for="start_date">Start Date</label>
                                        <input type="text" class="form-control" id="datepicker_profit_start" name="start_date">
                                    </div>
                                    <div class="col-xs-6">
                                        <label class="label-control" for="end_date">End Date</label>
                                        <input type="text" class="form-control" id="datepicker_profit_end" name="end_date">
                                    </div>
                                </div>

                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>
                            </div>
                    </form>
            </div>
            
            
            
            <div class="col-md-3">
                <h2>Balance Sheet</h2>
                    <form role="form" class="form-horizontal" method="POST" action="/sampleACHCSV/xlsx">

                        {{ csrf_field() }}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label class="label-control" for="start_date">Start Date</label>
                                        <input type="text" class="form-control" id="datepicker_balance_sheet" name="start_date">
                                    </div>
                                    <div class="col-xs-6">
                                        <label class="label-control" for="end_date">End Date</label>
                                        <input type="text" class="form-control" id="datepicker_balance_sheet_end" name="end_date">
                                    </div>
                                </div>

                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>
                            </div>
                    </form>
            </div>


            <div class="col-md-3">
                <h2>Profit / Loss</h2>
                    <form role="form" class="form-horizontal" method="POST" action="/achCSV/xlsx">

                        {{ csrf_field() }}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label class="label-control" for="start_date">Start Date</label>
                                        <input type="text" class="form-control" id="datepicker_ach_start" name="start_date">
                                    </div>
                                    <div class="col-xs-6">
                                        <label class="label-control" for="end_date">End Date</label>
                                        <input type="text" class="form-control" id="datepicker_ach_end" name="end_date">
                                    </div>
                                </div>

                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>
                            </div>
                    </form>
            </div>
            
        </div> <!-- End row -->
    </div> <!-- End well -->


<table class="table table-hover">
    <thead>
      <tr>
        <th>Action Date</th>
        <th>Upload Date</th>
        <th>Reference #</th>
        <th>Type</th>
        <th>Type Description</th>
        <th>Journal Entry #</th>
        <th>PRO #</th>
        <th>Account Name</th>
        <th>Account ID #</th>
        <th>Memo</th>
        <th>Payment Method</th>
        <th>Payment Amount</th>
        <th>Deposit Amount</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach($general_ledger as $ledger)
		
      <tr class="loadlist_row alt-colors">
        <td>{{ $ledger->date }}</td>
        <td>{{ $ledger->upload_date }}</td>
        <td>{{ $ledger->reference_number }}</td>
        <td>{{ $ledger->type }}</td>
        <td>{{ $ledger->type_description }}</td>

        
        
        
        <td><a href="{{ URL::to('/journal/' . $ledger->journal_entry_number  . '/edit') }}" title="edit">{{ $ledger->journal_entry_number }}</a></td>
        <td><a href="{{ URL::to('/edit/url?id=' . $ledger->pro_number) }}" title="edit">{{ $ledger->pro_number }}</a></td>
		    


        <td>{{ $ledger->account_name }}</td>
        <td>{{ $ledger->account_id }}</td>
        <td><a href="#" class="inactiveLink" title="Memo" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $ledger->memo }}">{{ substr($ledger->memo, 0, 25) }} {{ strlen($ledger->memo) > 25 ? "..." : "" }}</a></td>
        <td>{{ $ledger->payment_method }}</td>
        <td>{{ $ledger->payment_amount }}</td>
        <td>{{ $ledger->deposit_amount }}</td>
        




      </tr>
      
      @endforeach
    </tbody>
  </table>

<h2>Total Balance - {{ $balance }}</h2>


@endsection