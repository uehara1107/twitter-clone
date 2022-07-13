<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Tweets;
use App\Models\Followers;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // ユーザーの取得
    public function index(User $user)
    {
        $all_users = $user->getAllUsers(auth()->user()->id);
        //getAllUsers->自分以外のユーザーの取得

        return view('user.index', [
            'all_users'  => $all_users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Tweets $tweets, Followers $followers)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $timelines = $tweets->getUserTimeLine($user->id);
        $tweet_count = $tweets->getTweetCount($user->id);
        $follow_count = $followers->getFollowCount($user->id);
        $follower_count = $followers->getFollowerCount($user->id);

        return view('user.show', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'timelines'      => $timelines,
            'tweet_count'    => $tweet_count,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // フォロー
    public function follow(User $user)
    {
        $userInfo = auth()->user();
        // フォローしているか
        $is_following = $userInfo->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $userInfo->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $userInfo = auth()->user();
        // フォローしているか
        $is_following = $userInfo->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $userInfo->unfollow($user->id);
            return back();
        }
    }

    
}
