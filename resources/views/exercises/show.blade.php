<h1>{{ $exercise->name }}</h1>
<p>{{ $exercise->description }}</p>
<p><strong>Difficulty:</strong> {{ $exercise->difficulty }}</p>

<h2>Rhythm Tracks</h2>
<table>
    <tr>
        <th>Order</th>
        <th>Pattern Name</th>
        <th>Time Signature</th>
        <th>BPM</th>
    </tr>
    @foreach ($exercise->rhythmTracks as $track)
{{--        @dd($track)--}}
        <tr>
            <td>{{ $track->track_index ?? '⚠️ missing pattern' }}</td>
            <td>{{ $track->rhythmPattern->name ?? '⚠️ missing pattern' }}</td>
            <td>{{ $track->rhythmPattern->time_signature ?? '⚠️ missing pattern' }}</td>
            <td>{{ $track->rhythmPattern->bpm ?? '⚠️ missing pattern' }}</td>
        </tr>
    @endforeach
</table>
