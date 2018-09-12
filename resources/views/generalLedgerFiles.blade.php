@extends('layouts.app')

@section('content')


<h1 class="text-center">Ledger <small>all journal entries, customer pay status = paid, carrier pay status = completed</small></h1>
<h3 class="text-center">Action Date <small>Carrier: Check or ACH sent date / Customer: Deposit date / Journal: Created date</small></h3>


<div class="container">

    <div class="btn-group" role="group" aria-label="Basic example">
        
        <a type="button" class="btn btn-md btn-info" href="{{ url('/allNeededPODs') }}">Needed BOL</a>
        <a type="button" class="btn btn-md btn-info" href="{{ url('/carrierPaidNotBilled') }}">Carrier Paid Not Billed</a>
        <a type="button" class="btn btn-md btn-info" href="{{ url('/paidVSAmountDue') }}">Paid vs. Amount Due</a>
        <a type="button" class="btn btn-md btn-info" href="{{ url('/xpoFuelRequest') }}">XPO Fuel Request</a>
        
    </div>

    <div class="well">
        <div class="row">
            <div class="col-md-4">
                <h2>Target type from ledger</h2>
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
                                </div>
                                <div class="row">
                                     <div class="col-xs-8">
                                        <label class="label-control" for="type_selected">Type</label>
                                        <select class="form-control" id="type_selected" name="type_selected">
                                            <option value="Asset">Asset</option>
                                            <option value="Liability">Liability</option>
                                            <option value="Distribution">Distribution</option>
                                            <option value="Equity">Equity</option>
                                            <option value="Expense">Expense</option>
                                            <option value="Revenue">Revenue</option>

                                        </select>
                                    </div>
                                </div>
                                

                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>
                            </div>
                    </form>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <h2>All data from ledger</h2>
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
            
            
            
           <!--  <div class="col-md-3">
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
            </div> -->


            <!-- <div class="col-md-3">
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
            </div> -->
            
        </div> <!-- End row -->
    </div> <!-- End well -->

    <div class="well">
        <div class="row">
            <div class="col-md-4">
                <h2>All data from ledger with only cleared checks</h2>
                    <form role="form" class="form-horizontal" method="POST" action="/generalLedgerTargetCheckPaid">

                        {{ csrf_field() }}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <label class="label-control" for="start_date">Start Date</label>
                                        <input type="text" class="form-control" id="datepickerClearedChecks" name="start_date">
                                    </div>
                                    <div class="col-xs-4">
                                        <label class="label-control" for="end_date">End Date (+1)</label>
                                        <input type="text" class="form-control" id="datepickerClearedChecks2" name="end_date">
                                    </div>
                                </div>
                                
                                

                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>
                            </div>
                    </form>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <h2>Balance Sheet</h2>
                    <form role="form" class="form-horizontal" method="POST" action="/balanceSheet">

                        {{ csrf_field() }}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label class="label-control" for="start_date">Start Date</label>
                                        <input type="text" class="form-control" id="datepicker_bs_start" name="start_date">
                                    </div>
                                    <div class="col-xs-6">
                                        <label class="label-control" for="end_date">End Date</label>
                                        <input type="text" class="form-control" id="datepicker_bs_end" name="end_date">
                                    </div>
                                </div>

                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>
                            </div>
                    </form>
            </div>
            
        </div> <!-- End row -->
    </div> <!-- End well -->

    <div class="well">
        <div class="row">
            <div class="col-md-4">
                <h2>All approved carrier invoices</h2>
                    <form role="form" class="form-horizontal" method="POST" action="/approvedCarrierBillsFile/xlsx">

                        {{ csrf_field() }}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <label class="label-control" for="start_date">Start Date</label>
                                        <input type="text" class="form-control" id="datepickerApprovedCarrierBills" name="start_date">
                                    </div>
                                    <div class="col-xs-4">
                                        <label class="label-control" for="end_date">End Date</label>
                                        <input type="text" class="form-control" id="datepickerApprovedCarrierBills2" name="end_date">
                                    </div>
                                </div>
                                
                                

                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>
                            </div>
                    </form>
            </div>
            
            
        </div> <!-- End row -->
    </div> <!-- End well -->
</div>



@endsection