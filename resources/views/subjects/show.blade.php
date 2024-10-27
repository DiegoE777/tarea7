<!-- resources/views/subjects/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $subject->name }}</h1>
    <p>{{ $subject->description }}</p>

    <h2>Actividades Evaluables</h2>
    <a href="{{ route('subjects.activities.create', $subject->id) }}" class="btn btn-primary">Agregar Actividad</a>

    <table class="table">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Calificación</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subject->activities as $activity)
                <tr>
                    <td>{{ $activity->type }}</td>
                    <td>{{ $activity->grade }}</td>
                    <td>{{ $activity->date }}</td>
                    <td>
                        <a href="{{ route('subjects.activities.edit', [$subject->id, $activity->id]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('subjects.activities.destroy', [$subject->id, $activity->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
