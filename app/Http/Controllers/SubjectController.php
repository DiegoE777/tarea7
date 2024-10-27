<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Muestra una lista de todas las materias.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Muestra el formulario para crear una nueva materia.
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Guarda una nueva materia en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Materia creada exitosamente');
    }

    /**
     * Muestra una materia específica junto con sus actividades evaluables.
     */
    public function show($id)
    {
        $subject = Subject::with('activities')->findOrFail($id);
        return view('subjects.show', compact('subject'));
    }

    /**
     * Muestra el formulario para editar una materia existente.
     */
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Actualiza una materia en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Materia actualizada exitosamente');
    }

    /**
     * Elimina una materia de la base de datos.
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Materia eliminada exitosamente');
    }
}
