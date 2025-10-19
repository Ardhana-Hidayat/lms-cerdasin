<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $classes = Classroom::all();
        $selectedClassId = session('selected_class');
        $selectedClass = $selectedClassId ? Classroom::find($selectedClassId) : null;

        return view('pages.student.index', compact('classes', 'selectedClass'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classrooms,id',
        ]);

        $classId = $request->input('class_id');

        session(['selected_class' => $classId]);

        $user = auth()->user();
        $user->selected_class_id = $classId;
        $user->save(); 

        return redirect()->route('student.student.dashboard')
            ->with('success', 'Kelas berhasil dipilih!');
    }
}
