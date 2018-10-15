@extends('layouts.app')

@section('content')


<div class="container">


@if (session('status'))
    <div class="alert alert-success alert-dismissible">
        
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session('status') }}</strong> Click the X at the far right to close this notification.
    </div>
@endif



<form role="form" class="form-horizontal" method="POST" action="/deleteEmailFromCarrier">

		{{ csrf_field() }}


		

			<div class="form-group">
				<div class="row">


					<div class="col-xs-6">
						<label class="label-control" for="email">Enter Email To Delete</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="carrier@carrier.com" required>
					</div>
					
					

				</div>

				<button style="margin-top: 10px;" type="submit" id="deleteEmailFromCarrier" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> DELETE</button>
		</div>
	</form>
</div>



@endsection