@extends('layouts.app')

@section('content')







<table style="width:100%">
  <tr>
    <th>Time</th>
    <th>Name</th> 
    <th>Debit</th>
    <th>Credit</th>
    <th>Balance</th>
  </tr>
  

  
    
  	@foreach($sorted as $sort)
  	<tr>
  	<td>{{ $sort->date }}</td>
  	<td>{{ $sort->name }}</td>

  	@if($sort->type === 'Debit')
  		<td>{{ $sort->rate }}</td>

  	@else
  		<td></td>
  	@endif

  	@if($sort->type === 'Credit')
  		<td>{{ $sort->rate }}</td>

  	@else
  		<td></td>
  	@endif
  	<td>{{ $sort->running_total }}</td>
  	</tr>

  	
  	@endforeach
    
  
  
</table>





@endsection