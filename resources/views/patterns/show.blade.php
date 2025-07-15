<!DOCTYPE html>
<html>
<head>
    <title>Rhythm Trainer</title>
    <link rel="stylesheet" href="/css/rhythm-player.css">
</head>
<body>

<h1>Rhythm Patterns</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Time Signature</th>
        <th>Pattern Data</th>
        <th>Play</th>
    </tr>
    <tr>
        <td>{{ $pattern->name }}</td>
        <td>{{ $pattern->time_signature }}</td>
        <td class="musical-notation">{{ $pattern->musical_notation }}</td>
        <td>
            <button class="play-sample" data-pattern="@json($pattern->pattern_data)" data-src="/samples/piano2.wav"
                    data-bpm="90">
                ▶️
            </button>
        </td>
    </tr>
</table>

<script src="/js/rhythm-player.js"></script>
</body>
</html>
