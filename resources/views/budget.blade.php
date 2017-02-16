@extends('layouts.app')

@section('content')

<div class="container">



    <div class="row">
        <div class="col-md-12">

            {!! Form::open(['route' => 'budget.store']) !!}
                @include('partials.budgetForm', ['submitButtonText' => 'New Post'])
            {!! Form::close() !!}

        </div>

        
        


        
           
       
          

    </div>


  <h2>Monthly Costs: {{ '$' . $postsSum . '.00' }}</h2>
             
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Description</th>
        <th>Monthly Cost</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Edit</th>
        <th>Destroy</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
        <td>{{ $post->description }}</td>
        <td>{{ $post->monthly_amount }}</td>
        <td>{{ date('M j, Y g:ia', strtotime($post->created_at)) }}</td>
        <td>{{ date('M j, Y g:ia', strtotime($post->updated_at)) }}</td>
        <td>{!! Html::linkRoute('budget.edit', 'Edit', array($post->id), ['class' => 'btn btn-success btn-block']) !!}</td>
        <td>{!! Form::open(['route' => ['budget.destroy', $post->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                    {!! Form::close() !!}</td>
      </tr>
      @endforeach
      
    </tbody>
  </table>

</div>


@endsection