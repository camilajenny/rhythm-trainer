<h1>Exercises</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Difficulty</th>
    </tr>
    @foreach ($exercises as $exercise)
        <tr>
            <td>{{ $exercise->name }}</td>
            <td>{{ $exercise->description }}</td>
            <td>{{ $exercise->difficulty }}</td>
        </tr>
    @endforeach
</table>

<style>
    table {
        border-spacing: 1rem;
    }
</style>
