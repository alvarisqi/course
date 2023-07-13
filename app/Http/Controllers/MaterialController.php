<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;


use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

     public function create($course)
    {
        $course = Course::findOrFail($course);
        return view('courses.materials.create', compact('course'));
    }

         
     
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $course)
    {
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'embed_link' => 'required',
        ]);
    
        $material = new Material;
        $material->course_id = $request->input('course_id');
        $material->title = $request->input('title');
        $material->description = $request->input('description');
        $material->embed_link = $request->input('embed_link');
        $material->save();
    
        return redirect()->route('courses.show', $course)->with('success', 'Materi berhasil ditambahkan');
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
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'embed_link' => 'required',
        ]);
    
        $material->title = $request->input('title');
        $material->description = $request->input('description');
        $material->embed_link = $request->input('embed_link');
        $material->save();
    
        return redirect()->route('courses.show', $material->course_id)->with('success', 'Informasi materi berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('courses.show', $material->course_id)->with('success', 'Materi berhasil dihapus');
    }    
}
