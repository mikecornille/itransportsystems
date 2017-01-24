@extends('layouts.app')

@section('content')

<div class="container">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form role="form" class="form-horizontal" method="POST" action="/budget">
        
        {{ csrf_field() }}


    <div id="equipment_data">
    <div class="well">
      
      <h2 class="text-center">ITS MONTHLY BUDGET</h2> 
      <div class="form-group">
        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
            </div>
            <div class="col-xs-8">
                <label class="label-control" for="monthly_amount">Monthly Amount</label>
                <input type="text" class="form-control" id="monthly_amount" name="monthly_amount" value="{{ old('monthly_amount') }}">
            </div>
        </div>

		<button type="submit" class="btn btn-primary" id="submit_new_note"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> NEW</button>

		</div>
		</div>
		</div>

</form>

<div class="list_for_notes" style="margin-left: 200px;">
<h1>${{ $total }}.00 per month</h1>
<table class="table">
    <thead>
      <tr>
        <th>Description</th>
        <th>Monthly Amount</th>
      </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
      <tr>
        <td>{{ $item->description }}</td>
        <td>${{ $item->monthly_amount }}.00</td>
      </tr>
    @endforeach
     </tbody>
  </table>
</div>
</div>
@endsection