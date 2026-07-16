<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;
use App\Models\UserProfile;

class UserProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $user = User::with('profile')->find($id);

        $userProfile = UserProfile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'nick_name' => $user->name,
                'file_name' => null,
                'description' => null,
            ]
        );

        $reviews = Post::where('user_id', $id)
            ->whereNull('parent_id')
            ->latest()
            ->get();


        return view('user_profile.show', compact('userProfile', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
