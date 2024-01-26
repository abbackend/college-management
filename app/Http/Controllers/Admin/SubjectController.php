<?php

namespace App\Http\Controllers\Admin;

use App\Constants\SubjectType;
use App\Http\Requests\SubjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::query()->get();
        return view('admin.subjects.index', [
            'subjects' => $subjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subjects.create', [
            'types' => SubjectType::cases()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectRequest $request)
    {
        Subject::query()->create($request->validated());
        return redirect()->route('subjects.index')->with('success', 'Record created succesfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view('admin.subjects.edit', [
            'subject' => $subject,
            'types' => SubjectType::cases()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectRequest $request, Subject $subject)
    {
        $subject->fill($request->validated())->save();
        return redirect()->route('subjects.index')->with('success', 'Record updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Record deleted succesfully!');
    }
}
