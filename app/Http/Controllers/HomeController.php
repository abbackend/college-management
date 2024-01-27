<?php

namespace App\Http\Controllers;

use App\Constants\UserType;
use App\Models\Course;
use App\Models\Result;
use App\Models\Subject;
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
        $user = Auth::user();
        if ($user->type->value == UserType::ADMIN->value) {
            return redirect()->route('admin.home');
        }

        $results = Result::query()->where('user_id', $user->id)
            ->where('is_published', true)
            ->get();
        return view('home', [
            'results' => $results->count()
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminIndex()
    {
        return view('admin.home', [
            'courses' => Course::query()->get()->count(),
            'students' => User::list()->get()->count(),
            'subjects' => Subject::query()->get()->count()
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
