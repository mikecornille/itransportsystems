@extends('layouts.app')

@section('content')



<input type="text" class="form-control" id="find-carrier-search" placeholder="Carrier Search">


<div class="col-xs-6">
                <label class="label-control" for="company">COMPANY</label>
                <input type="text" class="form-control" id="company" name="company">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="mc_number">MC #</label>
                <input type="text" class="form-control" id="mc_number" name="mc_number">
            </div>
            <div class="col-xs-3">
                <label class="label-control" for="dot_number">DOT #</label>
                <input type="text" class="form-control" id="dot_number" name="dot_number">
            </div>





@endsection