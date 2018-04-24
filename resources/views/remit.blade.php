@extends('layouts.app')

@section('content')

<div class="container">


        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    



    <div class="row">
        <div class="col-md-12">

            {!! Form::open(['route' => 'remit.store']) !!}
                @include('partials.remitForm', ['submitButtonText' => 'New Factoring Company'])
            {!! Form::close() !!}

        </div>

        </div>
             
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Bank Name</th>
        <th>Account Name</th>
        <th>Routing #</th>
        <th>Account #</th>
        <th>Act. Type</th>
        <th>Act. Email</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
        <td>{{ $post->name }}</td>
        <td>{{ $post->address }}</td>
        <td>{{ $post->city }}</td>
        <td>{{ $post->bank_name }}</td>
        <td>{{ $post->account_name }}</td>
        <td>{{ $post->routing_number }}</td>
        <td>{{ $post->account_number }}</td>
        <td>{{ $post->account_type }}</td>
        <td>{{ $post->accounting_email }}</td>
        <td>{!! Html::linkRoute('remit.edit', 'Edit', array($post->id), ['class' => 'btn btn-success btn-block']) !!}</td>
      </tr>
      @endforeach
      
    </tbody>
  </table>

</div>


@endsection