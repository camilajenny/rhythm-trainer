@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href={{ asset("/css/table.css") }}>
@endpush

@section('content')
    <h1>{{ $exercise->name }}</h1>
    <p>{{ $exercise->description }}</p>
    <p><strong>Difficulty:</strong> {{ $exercise->difficulty }}</p>

    <h2>Rhythm Tracks</h2>
    <table>
        <tr>
            <th>Pattern Name</th>
            <th>Time Signature</th>
            <th>BPM</th>
        </tr>
        @foreach ($exercise->rhythmTracks as $track)
            <tr>
                <td>
                    <a href="{{ route('patterns.show', ['pattern' => $track->rhythm_pattern_id]) }}">
                        {{ $track->rhythmPattern->name }}
                    </a>
                </td>
                <td>{{ $track->rhythmPattern->time_signature }}</td>
                <td>{{ $track->rhythmPattern->bpm }}</td>
            </tr>
        @endforeach
    </table>
@endsection
