<!-- resources/views/subjects/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Lista de Materias</h1>
    <a href="{{ route('subjects.create') }}" class="btn btn-primary">Agregar Materia</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->description }}</td>
                    <td>
                        <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display: inline;">
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
