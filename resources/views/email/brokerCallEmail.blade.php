@for ($i = 0; $i < count($info); $i++)
    <p>Lane: {{ $info[$i]['pick_city'] }}, {{ $info[$i]['pick_state'] }} to {{ $info[$i]['delivery_city'] }}, {{ $info[$i]['delivery_state'] }} for {{ $info[$i]['customer'] }} - urgency - {{ $info[$i]['urgency'] }} </p>
@endfor