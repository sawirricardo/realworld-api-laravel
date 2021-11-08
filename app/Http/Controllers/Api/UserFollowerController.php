<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserFollower;
use Illuminate\Http\Request;

/**
 * @group Follow/Unfollow User
 */
class UserFollowerController extends Controller
{
    /**
     * Follow a user.
     *
     * @urlParam user required The ID of the user. Example: 1
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user)
    {
        $user->userFollowers()->create([
            'follower_id' => request()->user()->id,
        ]);
        return new UserResource($user);
    }


    /**
     * Unfollow a user.
     *
     * @urlParam user required The ID of the user. Example: 1
     * @param  \App\Models\UserFollower  $userFollower
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->userFollowers()->where('follower_id', request()->user()->id)->delete();
        return new UserResource($user);
    }
}
