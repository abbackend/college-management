<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Gender;
use App\Constants\UserCategory;
use App\Constants\UserStatus;
use App\Http\Requests\UserRequest;
use App\Mail\UserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::list()->get();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create', [
            'genders' => Gender::cases(),
            'categories' => UserCategory::cases(),
            'statuses' => UserStatus::cases(),
            'courses' => Course::query()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        unset($data['profile_image']);
        $user = User::query()->create($data);
        $profile_image = null;
        if($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $profile_image = str_replace('public/', '', $file->store('public'));
        }

        $signature_image = null;
        if($request->hasFile('signature_image')) {
            $file = $request->file('signature_image');
            $signature_image = str_replace('public/', '', $file->store('public'));
        }

        $user->details->update(array_merge(
            $data,
            [
                'profile_image' => $profile_image,
                'signature_image' => $signature_image
            ]
        ));

        Mail::to($request->user())->send(new UserRegistered($user, $data['password']));
        return redirect()->route('users.index')->with('success', 'Record created succesfully!');
    }

    /**
     * Show the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.view', [
            'user' => $user
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'genders' => Gender::cases(),
            'categories' => UserCategory::cases(),
            'statuses' => UserStatus::cases(),
            'courses' => Course::query()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        unset($data['profile_image']);

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->fill($data)->save();
        $profile_image = null;
        if($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $profile_image = str_replace('public/', '', $file->store('public'));

            if (!empty($user->details->profile_image)) {
                $path = Storage::path('public/'.$user->details->profile_image);
                unlink($path);
            }
        }

        $signature_image = null;
        if($request->hasFile('signature_image')) {
            $file = $request->file('signature_image');
            $signature_image = str_replace('public/', '', $file->store('public'));

            if (!empty($user->details->signature_image)) {
                $path = Storage::path('public/'.$user->details->signature_image);
                unlink($path);
            }
        }

        if (!empty($profile_image)) {
            $data = array_merge(
                $data,
                ['profile_image' => $profile_image]
            );
        }

        if (!empty($signature_image)) {
            $data = array_merge(
                $data,
                ['signature_image' => $signature_image]
            );
        }
        $user->details->update($data);
        return redirect()->route('users.index')->with('success', 'Record updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Record deleted succesfully!');
    }
}
