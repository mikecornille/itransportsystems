@extends('layouts.app')

@section('content')


<h1 class="text-center">General Ledger <small>all journal entries, customer pay status = paid, carrier pay status = completed</small></h1>


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
                                            <option value="Accounts Receivable">Accounts Receivable</option>
                                            <option value="Accounts Payable">Accounts Payable</option>
                                            <option value="Bank">Bank</option>
                                            <option value="Cost Of Goods Sold">Cost Of Goods Sold</option>
                                            <option value="Equity">Equity</option>
                                            <option value="Expense">Expense</option>
                                            <option value="Fixed Asset">Fixed Asset</option>
                                            <option value="Income">Income</option>
                                            <option value="Other Current Asset">Other Current Asset</option>
                                            <option value="Other Asset">Other Asset</option>
                                            <option value="Other Current Liability">Other Current Liability</option>
                                            <option value="Other Income">Other Income</option>
                                            <option value="Other Expense">Other Expense</option>
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
                    <form role="form" class="form-horizontal" method="POST" action="/profitLoss">

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




   <table id="generalLedgerTable" cellspacing="0" class="stripe row-border order-column" style="border-collapse: collapse; width: 2800px; margin-left: 10px; font-size: 12px; table-layout: fixed; word-wrap:break-word;">

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
        <th>Running Total</th>
        
        
        
        
        


      </tr>
    </thead>
    <tfoot>
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
        <th>Running Total</th>
        
        
        
        

      </tr>
    </tfoot>  
  </table>

<h2>Total Balance - {{ $balance }}</h2>


@endsection