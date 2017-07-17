<p>Below are the screaming loads on the list, please let me know the true status of them by noon.  If they are on the east coast try to check on them right away so we have time to do whatever it takes to move them.</p>

@for ($i = 0; $i < count($info); $i++)
    <p>Lane: {{ $info[$i]['pick_city'] }}, {{ $info[$i]['pick_state'] }} to {{ $info[$i]['delivery_city'] }}, {{ $info[$i]['delivery_state'] }} created by {{ $info[$i]['created_by'] }} for {{ $info[$i]['created_by'] }} - urgency - {{ $info[$i]['urgency'] }} </p>
@endfor