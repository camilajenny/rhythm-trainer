@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href={{ asset("/css/rhythm-player.css") }}>
@endpush

@section('content')
    <h1>Rhythm Patterns</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Time Signature</th>
            <th>Pattern Data</th>
            <th>Play</th>
        </tr>
        @foreach ($patterns as $pattern)
            <tr>
                <td>{{ $pattern->name }}</td>
                <td>{{ $pattern->time_signature }}</td>
                <td class="musical-notation">{{ $pattern->musical_notation }}</td>
                <td>
                    <button class="play-sample" data-pattern="@json($pattern->pattern_data)"
                            data-src="/samples/piano1.wav"
                            data-bpm="90">
                        ▶️
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@push('scripts')
    <script src={{ asset("/js/rhythm-player.js") }}></script>
@endpush

