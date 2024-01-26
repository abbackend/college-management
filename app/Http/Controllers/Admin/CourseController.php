<?php

namespace App\Http\Controllers\Admin;

use App\Constants\CourseType;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\CourseSubject;
use App\Models\Subject;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::query()->get();
        return view('admin.courses.index', [
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create', [
            'types' => CourseType::cases(),
            'subjects' => Subject::query()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $data = $request->validated();
        $course = Course::query()->create($data);
        foreach ($data['subjects'] as $subject_id) {
            CourseSubject::query()->create([
                'course_id' => $course->id,
                'subject_id' => $subject_id
            ]);
        }
        return redirect()->route('courses.index')->with('success', 'Record created succesfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit', [
            'course' => $course,
            'types' => CourseType::cases(),
            'subjects' => Subject::query()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        $data = $request->validated();
        $course->fill($data)->save();
        $course->subjects()->delete();
        foreach ($data['subjects'] as $subject_id) {
            CourseSubject::query()->create([
                'course_id' => $course->id,
                'subject_id' => $subject_id
            ]);
        }
        return redirect()->route('courses.index')->with('success', 'Record updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Record deleted succesfully!');
    }
}
