<!-- resources/views/activities/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Agregar Nueva Actividad</h1>

    <form action="{{ route('subjects.activities.store', $subject->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type">Tipo de Actividad</label>
            <input type="text" name="type" id="type" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="grade">Calificación</label>
            <input type="number" name="grade" id="grade" class="form-control" step="0.1" min="0" max="100" required>
        </div>

        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
