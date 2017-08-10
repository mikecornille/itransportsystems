@extends('layouts.app')

@section('content')

<div class="container">
             
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Customer Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Ambassador</th>
        <th>internal_notes</th>
        <th>Updated Last</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
        <td>{{ $post->name }}</td>
        <td>{{ $post->contact }}</td>
        <td>{{ $post->email }}</td>
        <td>{{ $post->phone }}</td>
        <td>{{ $post->customer_ambassador }}</td>
        <td>{{ $post->internal_notes }}</td>
        <td>{{ date('M j, Y g:ia', strtotime($post->updated_at)) }}</td>
     </tr>
      @endforeach
      
    </tbody>
  </table>

</div>


@endsection