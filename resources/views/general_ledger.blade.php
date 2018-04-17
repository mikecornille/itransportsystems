@extends('layouts.app')

@section('content')


<h1 class="text-center">General Ledger</h1>


<table class="table table-hover">
    <thead>
      <tr>
        <th>App Crr Inv/Deposit Date</th>
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