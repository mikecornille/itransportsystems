@extends('layouts.app')

@section('content')

<div class="container">


         <div class="row">
        <div class="col-md-8">
            {!! Form::model($post, ['route' => ['remit.update', $post->id], 'method' => 'PUT']) !!}
                @include('partials.remitForm', ['submitButtonText' => 'Update Remit'])
            {!! Form::close() !!}
        </div>

        <div class="col-md-4">
            

            {!! Html::linkRoute('remit.index', 'Back', array(), ['class' => 'btn btn-warning btn-block']) !!}
        </div>
    </div>
             
  

</div>


@endsection