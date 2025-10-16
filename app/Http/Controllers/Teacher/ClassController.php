<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classroom::all();
        return view('pages.teacher.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('pages.teacher.classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Classroom::create([
            'name' => $request->name,
        ]);

        return redirect()->route('teacher.classes.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit(Classroom $class)
    {
        return view('pages.teacher.classes.edit', compact('class'));
    }

    public function update(Request $request, Classroom $class)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $class->update(['name' => $request->name]);

        return redirect()->route('teacher.classes.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Classroom $class)
    {
        $class->delete();

        return back()->with('success', 'Kelas berhasil dihapus.');
    }
}