<h3>Your Shipments for Today</h3>

@for ($i = 0; $i < count($info); $i++)
    <p>Lane: {{ $info[$i]['pick_city'] }}, {{ $info[$i]['pick_state'] }} to {{ $info[$i]['delivery_city'] }}, {{ $info[$i]['delivery_state'] }}  created by {{ $info[$i]['created_by'] }} for {{ $info[$i]['customer'] }} - urgency - {{ $info[$i]['urgency'] }}</p>
@endfor

<p>Please check Truckstop, DAT, and email out to find options.  If the shipment is getting stagnant inform the creator all the measures taken to move it and come up with a plan to find options (increase rate, offer quick pay, post to larger city, expand the posted date range, match with other freight, email out to surrounding states or the shipments surrounding destination states, etc.)</p>

<p>Of course, prioritize your time by first focusing on the screamers and full loads you have been assigned.  Screamers need options, and full loads are easier to move by calling/emailing out on.</p>