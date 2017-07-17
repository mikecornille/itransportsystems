<p>Below are the screaming loads on the list for today's date, let Matt King know if you have had any correspondence with the customer, shipper, or receiver regarding the shipments you created.  If you have not, King will use his soothing voice to strategically contact the shipper/receiver for a true heat check.  So please either inform King you made all the necessary calls to get an accruate heat check or give him the go ahead to investigate.</p>

@for ($i = 0; $i < count($info); $i++)
    <p>Lane: {{ $info[$i]['pick_city'] }}, {{ $info[$i]['pick_state'] }} to {{ $info[$i]['delivery_city'] }}, {{ $info[$i]['delivery_state'] }} created by {{ $info[$i]['created_by'] }} for {{ $info[$i]['customer'] }} - urgency - {{ $info[$i]['urgency'] }} </p>
@endfor