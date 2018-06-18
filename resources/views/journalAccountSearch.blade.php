@extends('layouts.app')

@section('content')

@php
$id = "";

@endphp


<div class="container">
	<h3>Account Search</h3>
	<div class="row">
		<div class="col-md-6">
			<label class="label-control" for="find-journal-account">SEARCH</label>
			<input type="text" class="form-control" id="find-journal-account" placeholder="Account Search">
		</div>

	</div>

	<div class="row">
		<div class="col-md-6">
			<form role="form" class="form-horizontal" method="POST" action="/journalAccountSearchEdit">
				{{ csrf_field() }}
				<label class="label-control" for="findJournalAccountsId">Account ID #</label>
				<input type="text" class="form-control" id="findJournalAccountsId" name="findJournalAccountsId">
				<button style="margin-top: 15px;" type="submit" class="btn btn-primary" id="findJournalAccountsSubmit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>

			</form>

		</div>
	</div>

	<div>
		<h3>Created Accounts</h3>
		<ul>
		@foreach($users as $user)

			<li>{{ $user->account_name }}</li>

		@endforeach
	</ul>
	</div>
</div>



@endsection