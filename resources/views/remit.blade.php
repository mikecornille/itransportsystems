@extends('layouts.app')

@section('content')

<div class="container">



    <div class="row">
        <div class="col-md-12">

            {!! Form::open(['route' => 'remit.store']) !!}
                @include('partials.remitForm', ['submitButtonText' => 'New Remit'])
            {!! Form::close() !!}

        </div>

        </div>
             
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
        <td>{{ $post->name }}</td>
        <td>{{ $post->address }}</td>
        <td>{{ $post->city }}</td>
        <td>{{ $post->state }}</td>
        <td>{{ $post->zip }}</td>
        <td>{!! Html::linkRoute('remit.edit', 'Edit', array($post->id), ['class' => 'btn btn-success btn-block']) !!}</td>
      </tr>
      @endforeach
      
    </tbody>
  </table>

</div>


@endsection