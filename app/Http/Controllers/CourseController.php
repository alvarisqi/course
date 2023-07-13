<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
/**
 * Display a listing of the resource.
 */
public function index()
{
    $courses = Course::all();
    return view('courses.index', compact('courses'));
}   

/**
 * Show the form for creating a new resource.
 */
public function create()
{
    return view('courses.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
        ]);
    
        $course = new Course;
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->duration = $request->input('duration');
        $course->save();
    
        return redirect()->route('courses.index')->with('success', 'Kursus berhasil dibuat');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($course)
    {
        $course = Course::findOrFail($course);
        return view('courses.show', compact('course'));
    }    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
        ]);
    
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->duration = $request->input('duration');
        $course->save();
    
        return redirect()->route('courses.index')->with('success', 'Informasi kursus berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Kursus berhasil dihapus');
    }
    
}
