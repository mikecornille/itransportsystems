@extends('layouts.app')

@section('content')


<h1 class="text-center">Freight Sales - ${{ $owed }} <small>All PRO #'s that have been billed but not paid</small></h1>

<div class="well">
        <div class="row">
            <div class="col-md-4">
                
                    <form role="form" class="form-horizontal" method="POST" action="/overallAgingDownload/xlsx">

                        {{ csrf_field() }}

                            <div class="form-group">
                                

                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Overall Aging</button>
                            </div>
                    </form>
            </div>
    </div>
</div>

<table id="mainTableAccountsReceivable" cellspacing="0" class="stripe row-border order-column hover" style="border-collapse: collapse; margin-left: 10px; font-size: 12px; table-layout: fixed; word-wrap:break-word;">

        <thead>
            <tr>
            
                <th>Pro</th>
                
               
                
                
              </tr>
        </thead>
        <tfoot>
            <tr>
            
                <th>Pro</th>
                
               
                
              
                
           
                

            </tr>
        </tfoot>  
   
    </table>


@endsection