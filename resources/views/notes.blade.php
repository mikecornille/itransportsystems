@extends('layouts.app')

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form role="form" class="form-horizontal" method="POST" action="/newNote">
        
        {{ csrf_field() }}


    <div id="equipment_data">
    <div class="well">
      
      <h2 class="text-center">ITS Notes</h2> 
      <div class="form-group">
        <div class="row">
            <div class="col-xs-4">
                <label class="label-control" for="time_name_stamp">Time/Name Stamp</label>
                <input type="text" class="form-control" id="time_name_stamp" name="time_name_stamp" value="{{ old('time_name_stamp') }}">
            </div>
            <div class="col-xs-8">
                <label class="label-control" for="notes">Notes</label>
                <input type="text" class="form-control" id="notes" name="notes" value="{{ old('notes') }}">
            </div>
        </div>

		<button type="submit" class="btn btn-primary" id="submit_new_note"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> NEW</button>

		</div>
		</div>
		</div>

</form>

<div class="list_for_notes" style="margin-left: 200px;">
<ul>
    @foreach($posts as $post)
        <li class="text-left notes-class">{{ $post->time_name_stamp . ' ' . $post->notes }}</li>
    @endforeach
</ul>
</div>



@endsection