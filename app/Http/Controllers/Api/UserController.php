<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @group User management
 */
class UserController extends Controller
{
    /**
     * Register new user.
     *
     * @bodyParam name string required The name of user.
     * @bodyParam email string required The email of user.
     * @bodyParam password string required The password of user.
     * @apiResourceModel \App\Http\Resources\UserResource
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string'],
            'name' => ['required', 'string'],
            'image' => ['sometimes', 'url'],
            'bio' => ['sometimes', 'string']
        ]);

        return new UserResource(User::create(
            request()->only(['email', 'password', 'name', 'image', 'bio'])
        ));
    }

    /**
     * Display a profile of user.
     * @urlParam id required The id of user. Example 1
     * @apiResourceModel \App\Http\Resources\UserResource
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->load(['articles.user', 'articles.tags']);
        return new UserResource($user);
    }

    /**
     * Get Current User
     *
     * @apiResourceModel \App\Http\Resources\UserResource
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function edit()
    {
        return new UserResource(request()->user());
    }

    /**
     * Update your user's settings.
     *
     * @bodyParam name string sometimes
     * @bodyParam email string sometimes, must unique
     * @bodyParam password string sometimes
     * @bodyParam image string sometimes
     * @bodyParam bio string sometimeså
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['sometimes'],
            'email' => ['sometimes', 'email', 'unique:users,email,' . $user->id],
            'password' => ['sometimes'],
            'bio' => ['sometimes'],
            'image' => ['sometimes', 'url']
        ]);
        return new UserResource(
            $user->update($request->only(['name', 'email', 'password', 'bio', 'image']))
        );
    }

    /**
     * Remove a user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }
}
