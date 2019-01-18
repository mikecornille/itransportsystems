@extends('layouts.app')

@section('content')



<h1>{{ $generalAccount[0]->type_description_sub . ': $' . $total }}</h1>

<table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th>Sub Desc</th>
        <th>Created</th>
        <th>Type</th>
        <th>Description</th>
        <th>Account</th>
        <th>Memo</th>
        <th>Payment Amount</th>
        <th>Deposit Amount</th>
        <!-- <th>Check Print</th>
        <th>Invoice Date</th>
        <th>Account</th>
        <th>Account ID #</th>
        
        <th>Sub Desc</th>
        <th>Reference #</th>
        <th>Memo</th>
        <th>Payment Method</th>
        <th>Payment Number</th>
        <th>Payment Amount</th>
        <th>Deposit Amount</th>
        <th>Cleared</th>
        <th>Cleared Date</th> -->
      </tr>
    </thead>
    <tbody>
    @foreach($generalAccount as $entry)
      <tr>
        <td></td>
        <td>{{ $entry->type_description_sub }}</td>
        <td>{{ $entry->created_at }}</td>
        <td>{{ $entry->type }}</td>
        <td>{{ $entry->type_description }}</td>
        <td>{{ $entry->account_name }}</td>
        <td>{{ $entry->memo }}</td>
        <td>${{ $entry->payment_amount }}</td>
        <td>${{ $entry->deposit_amount }}</td>


        <!-- <td>{{ $entry->upload_date }}</td>
        <td>{{ $entry->invoice_date_journal }}</td>
        <td>{{ $entry->account_name }}</td>
        <td>{{ $entry->account_id }}</td>
        
        <td>{{ $entry->type_description_sub }}</td>
        <td>{{ $entry->reference_number }}</td>
        <td><a href="#" class="inactiveLink" title="Memo" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{ $entry->memo }}">{{ substr($entry->memo, 0, 25) }} {{ strlen($entry->memo) > 25 ? "..." : "" }}</a></td>
        <td>{{ $entry->payment_method }}</td>
        <td>{{ $entry->payment_number }}</td>
        <td>{{ $entry->payment_amount }}</td>
        <td>{{ $entry->deposit_amount }}</td>
        <td>{{ $entry->cleared }}</td>
        <td>{{ $entry->cleared_date }}</td>
        <td>{!! Html::linkRoute('journal.edit', 'Edit', array($entry->id), ['class' => 'btn btn-success btn-block']) !!}</td> -->
      </tr>
      @endforeach
      
    </tbody>
  </table>

  

@endsection