<?php

namespace App\Http\Controllers;

use App\Constants\UserType;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'displayImage']);
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        if (Auth::user()->type->value == UserType::ADMIN->value) {
            return redirect()->route('admin.home');
        }

        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminIndex()
    {
        $courses = Course::query()->get()->count();
        $students = User::list()->get()->count();
        $subjects = 20;
        return view('admin.home', [
            'courses' => $courses,
            'students' => $students,
            'subjects' => $subjects
        ]);
    }

    public function displayImage(string $filename)
    {
        $path = Storage::path('public/'.$filename);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file);
        $response->header("Content-Type", $type);
        return $response;
    }
}
