<h1>Rhythm Patterns</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Time Signature</th>
        <th>Difficulty</th>
    </tr>
@foreach ($patterns as $pattern)
    <tr>
        <td>{{ $pattern->name }}</td>
        <td>{{ $pattern->time_signature }}</td>
        <td>{{ implode(', ', $pattern->pattern_data) }}</td>
    </tr>
@endforeach
</table>
