@extends('layouts.app')

<style>
.hit-the-floor {
color: #fff;
font-size: 3em;
font-weight: bold;
font-family: Helvetica;
text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
}

.hit-the-floor {
  text-align: left;
}

body {
  background-color: #f1f1f1;
}

.hit-the-shit {
color: #fff;
font-size: 3em;
font-weight: bold;
font-family: Helvetica;
text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
}

.hit-the-floor {
  text-align: center;
}

</style>

@section('content')
<!-- 
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
            <div class="col-xs-3">
                <label class="label-control" for="time_name_stamp">Time/Name Stamp</label>
                <input type="text" class="form-control" id="time_name_stamp" name="time_name_stamp" value="{{ old('time_name_stamp') }}">
            </div>
            <div class="col-xs-6">
                <label class="label-control" for="notes">Notes</label>
                <input type="text" class="form-control" id="notes" name="notes" value="{{ old('notes') }}">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="dialed_out">Dialed/Emailed Out</label>
                <input type="text" class="form-control" id="dialed_out" name="dialed_out" value="{{ old('dialed_out') }}">
            </div>


        </div>

		<button type="submit" class="btn btn-primary" id="submit_new_note"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> NEW</button>

		</div>
		</div>
		</div>

</form>

<div style="margin-left: 200px;">
<table class="table table-striped" style="width: 1700px;">
<tr>
    <th>Creator</th>
    <th>Notes</th> 
    <th>Dialed/Emailed Out</th>
  </tr>
    @foreach($posts as $post)
        
        <tr>
            <td>{{ $post->time_name_stamp }}</td>
            <td>{{ $post->notes }}</td> 
            <td>{{ $post->dialed_out }}</td>
        </tr>
    @endforeach
</table>



  


</div> -->

<!-- <div class="container">

<div class="hit-the-floor">International Transport Systems</div>
<ul>
<li>International Transport Systems</li>
<li>111 N Addison Ave FL 2</li>
<li>Elmhurst, IL 60126</li>
<li>Toll Free: 877-663-2200</li>
<li>Phone: 630-832-6900</li>
<li>Fax: 630-832-6901</li>
<li>Accounting: 630-833-1618</li>
</ul>
<ul>
<li>General Liability</li>
<li>Stassen Insurance Agency</li>
<li>Carol.Stassen@StassenInsurance.com</li>
<li>Laurie.S@StassenInsurance.com</li>
<li>TerriS@StassenInsurance.com</li>
<li>Fax: 630-832-6901</li>
<li>Accounting: 630-833-1618</li>
</ul>

</div> -->

@endsection