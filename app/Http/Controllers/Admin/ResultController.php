<?php

namespace App\Http\Controllers\Admin;

use App\Constants\ResultStatus;
use App\Http\Requests\ResultRequest;
use App\Http\Controllers\Controller;
use App\Models\Mark;
use App\Models\Result;
use App\Models\Subject;
use App\Models\User;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Result::query()->get();
        return view('admin.results.index', [
            'results' => $results,
            'students' => User::list()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResultRequest $request)
    {
        $data = $request->validated();
        $user = User::query()->find($data['user_id']);
        $result = Result::query()->create([
            'user_id' => $user->id,
            'course_name' => $user->details->course->name,
            'course_code' => $user->details->course->code,
            'course_duration' => $user->details->course_duration,
            'course_duration_type' => $user->details->course->duration_type->value,
            'status' => ResultStatus::FAIL->value,
            'student_status' => $user->details->status->value,
            'is_published' => false
        ]);

        foreach ($data['marks'] as $mark) {
            $subject = Subject::query()->find($mark['subject']);
            Mark::query()->create([
                'result_id' => $result->id,
                'subject_name' => $subject->name,
                'subject_code' => $subject->code,
                'subject_type' => $subject->type->value,
                'theory_marks' => (int)$mark['theory_marks'],
                'practical_marks' => (int)$mark['practical_marks'],
                'theory_max_marks' => $subject->theory_marks,
                'practical_max_marks' => $subject->practical_marks
            ]);
        }
        
        $result->fresh();
        if ($result->percentage > 32) {
            $result->update(['status' => ResultStatus::PASS->value]);
        }

        return redirect()->route('results.index')->with('success', 'Record created succesfully!');
    }

    /**
     * Show the specified resource.
     */
    public function show(Result $result)
    {
        return view('admin.results.view', [
            'result' => $result
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        $result->delete();
        return redirect()->route('results.index')->with('success', 'Record deleted succesfully!');
    }

    /**
     * Publish the result.
     */
    public function publish(Result $result)
    {
        $result->update(['is_published' => true]);
        return redirect()->route('results.index')->with('success', 'Record published succesfully!');
    }

    /**
     * Publish the result.
     */
    public function generate(User $user)
    {
        return view('admin.results.create', [
            'user' => $user
        ]);
    }
}
