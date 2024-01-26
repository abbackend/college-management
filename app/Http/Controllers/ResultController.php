<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Result;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $results = Result::query()->where('user_id', $user->id)
            ->where('is_published', true)
            ->get();
        return view('admin.results.index', [
            'results' => $results
        ]);
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
}
