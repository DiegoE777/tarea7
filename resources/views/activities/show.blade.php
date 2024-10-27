<!-- resources/views/activities/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalles de la Actividad</h1>
    <p><strong>Tipo de Actividad:</strong> {{ $activity->type }}</p>
    <p><strong>Calificación:</strong> {{ $activity->grade }}</p>
    <p><strong>Fecha:</strong> {{ $activity->date }}</p>

    <a href="{{ route('subjects.activities.edit', [$subject->id, $activity->id]) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('subjects.activities.destroy', [$subject->id, $activity->id]) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
@endsection
