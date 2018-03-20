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

            {!! Form::open(['route' => 'journal.store']) !!}
                @include('partials.journalForm', ['submitButtonText' => 'New Journal'])
            {!! Form::close() !!}

        </div>

        </div>
             
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    @foreach($journal_entries as $entry)
      <tr>
        <td>{{ $journal->name }}</td>
        <td>{!! Html::linkRoute('journal.edit', 'Edit', array($journal->id), ['class' => 'btn btn-success btn-block']) !!}</td>
      </tr>
      @endforeach
      
    </tbody>
  </table>

</div>


@endsection