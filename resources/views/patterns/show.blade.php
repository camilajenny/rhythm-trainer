@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href={{ asset("/css/rhythm-player.css") }}>
    <link rel="stylesheet" href={{ asset("/css/tempo-bar.css") }}>
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
        <tr>
            <td>{{ $pattern->name }}</td>
            <td>{{ $pattern->time_signature }}</td>
            <td class="musical-notation-container">
                <div class="musical-notation">
                    @foreach($pattern->musical_notation as [$note, $duration])
                        <span class="note" data-duration="{{ $duration }}">{{ $note }}</span>
                    @endforeach
                </div>
                <div id="tempo-bar-overlay" class="tempo-bar-overlay" style="display: none;">
                    <div id="tempo-progress-overlay" class="tempo-progress-overlay"></div>
                    <div id="beat-markers-overlay" class="beat-markers-overlay"></div>
                </div>
                {{-- This is the new tap feedback area --}}
                <div id="tap-feedback-layer" class="tap-feedback-layer"></div>
            </td>
            <td>
                <button class="play-sample" data-pattern="@json($pattern->pattern_data)" data-src="/samples/piano2.wav"
                        data-bpm="90">
                    ▶️
                </button>
            </td>
        </tr>
    </table>

    <div class="instructions" style="text-align: center; margin-top: 1rem; color: #6c757d;">
        Press any key to tap along with the rhythm when playback starts.
    </div>
@endsection

@push('scripts')
    <script src={{ asset("/js/rhythm-player.js") }}></script>
    <script src={{ asset("js/tap_evaluation_rhythm_player.js") }}></script>
@endpush
