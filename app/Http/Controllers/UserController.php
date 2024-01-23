<?php

namespace App\Http\Controllers;

use App\Constants\Gender;
use App\Constants\UserCategory;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
            'categories' => UserCategory::cases()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = User::query()->create($request->validated());
        $profile_image = null;
        if($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $profile_image = str_replace('public/', '', $file->store('public'));
        }

        $user->details->update(array_merge(
            $request->validated(),
            ['profile_image' => $profile_image]
        ));
        return redirect()->route('users.index')->with('success', 'Record created succesfully!');
    }

    /**
     * Show the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.view', [
            'user' => $user,
            'genders' => Gender::cases(),
            'categories' => UserCategory::cases()
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
            'categories' => UserCategory::cases()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
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

        $user->details->update(array_merge(
            $data,
            ['profile_image' => $profile_image]
        ));
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
