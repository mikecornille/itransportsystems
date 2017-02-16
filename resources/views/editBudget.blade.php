@extends('layouts.app')

@section('content')

<div class="container">



    <div class="row">
        <div class="col-md-8">
            {!! Form::model($post, ['route' => ['budget.update', $post->id], 'method' => 'PUT']) !!}
                @include('partials.budgetForm', ['submitButtonText' => 'Update Post'])
            {!! Form::close() !!}
        </div>

        <div class="col-md-4">
            {!! Form::open(['route' => ['budget.destroy', $post->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}

            {!! Html::linkRoute('budget.index', 'Back', array(), ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    </div>
</div>

@endsection