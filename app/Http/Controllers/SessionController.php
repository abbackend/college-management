<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use App\Models\Session;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Session::query()->get();
        return view('admin.sessions.index', [
            'sessions' => $sessions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SessionRequest $request)
    {
        Session::query()->create($request->validated());
        return redirect()->route('sessions.index')->with('success', 'Record created succesfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        return view('admin.sessions.edit', [
            'session' => $session
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SessionRequest $request, Session $session)
    {
        $session->fill($request->validated())->save();
        return redirect()->route('sessions.index')->with('success', 'Record updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('sessions.index')->with('success', 'Record deleted succesfully!');
    }
}
