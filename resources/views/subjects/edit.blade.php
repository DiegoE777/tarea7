<!-- resources/views/subjects/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Materia</h1>

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nombre de la Materia</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $subject->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" class="form-control">{{ $subject->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
