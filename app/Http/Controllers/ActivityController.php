<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Subject;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Muestra una lista de actividades evaluables para una materia específica.
     */
    public function index($subject_id)
    {
        $subject = Subject::findOrFail($subjectId);
        $activities = Activity::where('subject_id', $subjectId)->get();
        return view('activities.index', compact('subject', 'activities'));
    }

    /**
     * Muestra el formulario para crear una nueva actividad para una materia específica.
     */
    public function create($subject_id)
    {
        $subject = Subject::findOrFail($subject_id);
        return view('activities.create', compact('subject'));
    }

    /**
     * Guarda una nueva actividad en la base de datos para una materia específica.
     */
    public function store(Request $request, $subject_id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'grade' => 'nullable|numeric|min:0|max:100',
            'date' => 'required|date'
        ]);

        $subject = Subject::findOrFail($subject_id);
        $subject->activities()->create($request->all());

        return redirect()->route('subjects.show', $subject_id)->with('success', 'Actividad creada exitosamente');
    }

    /**
     * Muestra una actividad específica de una materia.
     */
    public function show($subject_id, $id)
    {
        $subject = Subject::findOrFail($subject_id);
        $activity = $subject->activities()->findOrFail($id);
        return view('activities.show', compact('subject', 'activity'));
    }

    /**
     * Muestra el formulario para editar una actividad específica de una materia.
     */
    public function edit($subject_id, $id)
    {
        $subject = Subject::findOrFail($subject_id);
        $activity = $subject->activities()->findOrFail($id);
        return view('activities.edit', compact('subject', 'activity'));
    }

    /**
     * Actualiza una actividad en la base de datos.
     */
    public function update(Request $request, $subject_id, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'grade' => 'nullable|numeric|min:0|max:100',
            'date' => 'required|date'
        ]);

        $subject = Subject::findOrFail($subject_id);
        $activity = $subject->activities()->findOrFail($id);
        $activity->update($request->all());

        return redirect()->route('subjects.show', $subject_id)->with('success', 'Actividad actualizada exitosamente');
    }

    /**
     * Elimina una actividad de la base de datos.
     */
    public function destroy($subject_id, $id)
    {
        $subject = Subject::findOrFail($subject_id);
        $activity = $subject->activities()->findOrFail($id);
        $activity->delete();

        return redirect()->route('subjects.show', $subject_id)->with('success', 'Actividad eliminada exitosamente');
    }
}
