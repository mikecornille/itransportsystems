<h2>New Carriers: {{ Carbon\Carbon::now()->format('F d, Y') }}</h2>
<h2>Daily Total: {{ count($info) }}</h2>

@for ($i = 0; $i < count($info); $i++)
    <p>Company name {{ $info[$i]['company'] }} from {{ $info[$i]['state'] }}</p>
@endfor
