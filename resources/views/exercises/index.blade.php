@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href={{ asset("/css/table.css") }}>
@endpush

@section('content')
    <h1>Exercises</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Difficulty</th>
        </tr>
        @foreach ($exercises as $exercise)
            <tr>
                <td>
                    <a href="{{ route('exercises.show', ['exercise' => $exercise->id]) }}">
                        {{ $exercise->name }}
                    </a>
                </td>
                <td>{{ $exercise->description }}</td>
                <td>{{ $exercise->difficulty }}</td>
            </tr>
        @endforeach
    </table>
@endsection

