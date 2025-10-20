<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('classroom')->get();
        return view('pages.teacher.materials.index', compact('materials'));
    }

    public function create()
    {
        $classes = Classroom::all();
        return view('pages.teacher.materials.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'title' => 'required|string|max:255',
            'material' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,mp4|max:5120',
        ]);

        $thumbnailPath = $request->file('thumbnail') ? $request->file('thumbnail')->store('thumbnails', 'public') : null;
        $filePath = $request->file('file_path') ? $request->file('file_path')->store('materials', 'public') : null;

        Material::create([
            'classroom_id' => $request->classroom_id,
            'title' => $request->title,
            'material' => $request->material,
            'thumbnail' => $thumbnailPath,
            'file_path' => $filePath,
        ]);

        return redirect()->route('teacher.materials.index')->with('success', 'Materi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        $classes = Classroom::all();
        return view('pages.teacher.materials.edit', compact('material', 'classes'));
    }

    public function show($id)
    {
        $material = Material::findOrFail($id);
        $classes = Classroom::all();
        return view('pages.teacher.materials.show', compact('material', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'title' => 'required|string|max:255',
            'material' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,mp4|max:5120',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($material->thumbnail) {
                Storage::disk('public')->delete($material->thumbnail);
            }
            $material->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($request->hasFile('file_path')) {
            if ($material->file_path) {
                Storage::disk('public')->delete($material->file_path);
            }
            $material->file_path = $request->file('file_path')->store('materials', 'public');
        }

        $material->update([
            'classroom_id' => $request->classroom_id,
            'title' => $request->title,
            'material' => $request->material,
            'thumbnail' => $material->thumbnail,
            'file_path' => $material->file_path,
        ]);

        return redirect()->route('teacher.materials.index')->with('success', 'Materi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $material = Material::findOrFail($id);

        if ($material->thumbnail) {
            Storage::disk('public')->delete($material->thumbnail);
        }

        if ($material->file_path) {
            Storage::disk('public')->delete($material->file_path);
        }

        $material->delete();

        return redirect()->route('teacher.materials.index')->with('success', 'Materi berhasil dihapus!');
    }
}