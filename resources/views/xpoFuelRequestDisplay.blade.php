@foreach($xpo as $x)

<p>{{ 'BOL # ' . $x->bol_number . ' / ITS PRO # ' . $x->id . ' Delivered: ' . $x->delivery_city . ', ' . $x->delivery_state . ' on ' . $x->delivery_date }}</p>



@endforeach


@foreach($xpo as $x)

<p>{{ $x->pick_status . ' / ' . $x->delivery_status }}</p>



@endforeach