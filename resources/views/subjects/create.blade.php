<!-- resources/views/subjects/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Materia</h1>

    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre de la Materia</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
