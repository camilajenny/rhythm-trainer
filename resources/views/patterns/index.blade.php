<h1>Rhythm Patterns</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Time Signature</th>
        <th>Pattern Data</th>
    </tr>
    @foreach ($patterns as $pattern)
        <tr>
            <td>{{ $pattern->name }}</td>
            <td>{{ $pattern->time_signature }}</td>
            <td class="musical-notation">{{ $pattern->musical_notation }}</td>
        </tr>
    @endforeach
</table>

<style>
    .musical-notation {
        font-family: 'Noto Music', 'Times New Roman', serif;
        font-size: 1.8em;
        letter-spacing: 0.3em;
    }
    table {
        border-spacing: 1rem;
    }
</style>
