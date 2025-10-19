<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Material;
use Illuminate\Http\Request;

class StudentMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $selectedClassId = session('selected_class');

        if (!$selectedClassId) {
            return redirect()->route('student.dashboard.index')
                ->with('error', 'Silakan pilih kelas terlebih dahulu untuk melihat materi.');
        }

        $selectedClass = Classroom::find($selectedClassId);

        $materials = Material::where('classroom_id', $selectedClassId)
            ->orderBy('created_at', 'desc') 
            ->get();

        return view('pages.student.materials.index', compact('materials', 'selectedClass'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
