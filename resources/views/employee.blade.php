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


    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'employee.store']) !!}
          		@include('partials.employeeForm', ['submitButtonText' => 'New Post'])
            {!! Form::close() !!}

        </div>

       



        
        
          

    </div>

    <div class="row">
    	<div class="col-md-12">

    	<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Employee Type</th>
        <th>Month/Year</th>
        <th>Months Profit</th>
        <th>Draw</th>
        <th>NCM</th>
        <th>Commission</th>
        <th>Bonus</th>
        <th>Additional</th>
        <th>Notes</th>
        <th>Created At</th>
        <th>Edit</th>
        <!-- <th>Destroy</th> -->
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
        		<td>{{ $post->name }}</td>
                <td>{{ $post->employee_type }}</td>
                <td>{{ $post->month . ' / ' . $post->year }}</td>
                <td>{{ $post->months_profit }}</td>
                <td>${{ $post->weekly_draw }}</td>
                <td>{{ $post->ncm }}</td>
                <td>${{ $post->commission }}</td>
                <td>${{ $post->bonus }}</td>
                <td>${{ $post->additional }}</td>
                <td>{{ substr($post->employee_payout_notes, 0, 25) }} {{ strlen($post->employee_payout_notes) > 25 ? "..." : "" }}</td>
		        <td>{{ date('M j, Y g:ia', strtotime($post->created_at)) }}</td>
		        <td>{!! Html::linkRoute('employee.edit', 'Edit', array($post->id), ['class' => 'btn btn-success btn-block']) !!}</td>
		        <!-- <td>{!! Form::open(['route' => ['employee.destroy', $post->id], 'method' => 'DELETE']) !!}
		                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
		                    {!! Form::close() !!}</td> -->
      </tr>
      @endforeach
      
    </tbody>
  </table>


    	</div>



    </div>
</div>


@endsection