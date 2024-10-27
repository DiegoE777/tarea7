<!-- resources/views/activities/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Actividad</h1>

    <form action="{{ route('subjects.activities.update', [$subject->id, $activity->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="type">Tipo de Actividad</label>
            <input type="text" name="type" id="type" class="form-control" value="{{ $activity->type }}" required>
        </div>

        <div class="form-group">
            <label for="grade">Calificación</label>
            <input type="number" name="grade" id="grade" class="form-control" step="0.1" min="0" max="100" value="{{ $activity->grade }}" required>
        </div>

        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $activity->date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
