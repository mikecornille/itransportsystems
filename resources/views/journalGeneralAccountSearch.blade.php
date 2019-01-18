
@extends('layouts.app')

@section('content')



<div class="container">

<table class="table">
	<thead>
		<tr>
			<th>General Account Name</th>
			<th>Current Balance</th>
		</tr>
	</thead>

<tbody>
@for ($i = 0; $i < count($info['info']); $i++)


@if ($info['info'][$i][0] == 0)

@else
   
<tr>
    <th><a href="{{ URL::to('/findGeneralAccount/' . $info['info'][$i][1]) }}">{{$info['info'][$i][1]}}</a></th>
    <th>{{ '$' . number_format($info['info'][$i][0], 2) }}</th>
</tr>

@endif
      
@endfor
</tbody>
</table>

</div>

@endsection



