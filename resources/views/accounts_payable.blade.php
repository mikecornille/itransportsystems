@extends('layouts.app')

@section('content')


<h1 class="text-center">Accounts Payable - ${{ $owed }} <small>vendor date = not null, not empty, carrier pay status = APPRVD</small></h1>

<div class="well">
        <div class="row">
            <div class="col-md-3">
                <h2>Target Type</h2>
                    <form role="form" class="form-horizontal" method="POST" action="/accountsPayableExcelFile/xlsx">

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

                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>
                            </div>
                    </form>
            </div>
    </div>
</div>
<table id="mainTableAccountsPayable" cellspacing="0" class="stripe row-border order-column hover" style="border-collapse: collapse; margin-left: 10px; font-size: 12px; table-layout: fixed; word-wrap:break-word;">

        <thead>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>Payment Method</th>
                <th>Carrier Name</th>
                <th>Carrier Rate</th>
                <th>Invoice Date</th>
                <th>Invoice Number</th>
                <th>Pay Status</th>
                <th>Due Date</th>
                <th>Aging</th>
                
              </tr>
        </thead>
        <tfoot>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>Payment Method</th>
                <th>Carrier Name</th>
                <th>Carrier Rate</th>
                <th>Invoice Date</th>
                <th>Invoice Number</th>
                <th>Pay Status</th>
                <th>Due Date</th>
                <th>Aging</th>
              
                
           
                

            </tr>
        </tfoot>  
   
    </table>


@endsection