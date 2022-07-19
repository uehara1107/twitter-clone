<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Follower;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $user ユーザー情報
     * @return \Illuminate\Http\Response
     * @return ユーザー一覧のView
     */

    public function index(User $user)
    {
        $allUsers = $user->fetchAllUsers(auth()->user()->id);
        //fetchAllUsers->自分以外のユーザーの取得

        return view('user.index', [
            'allUsers'  => $allUsers
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
    public function show($id)
    {
        //
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
    /**
     * フォローするための関数
     * 
     * @ver userInfo Authに保存済みのユーザーの情報
     * @ver isFollowing ユーザーがフォローしているユーザーid
     * 
     * @param $user ユーザー情報
     * @return 直前ページURI RedirectResponseクラス
     */
    public function follow(User $user)
    {
        $userInfo = auth()->user();
        // フォローしているか
        $isFollowing = $userInfo->isFollowing($user->id);
        if(!$isFollowing) {
            // フォローしていなければフォローする
            $userInfo->follow($user->id);
            return back();
        }
        return back();
    }

    // フォロー解除
    /**
     * フォロー解除のための関数
     * 
     * @ver userInfo Authに保存済みのユーザーの情報
     * @ver isFollowing ユーザーがフォローしているユーザーid
     * 
     * @param $user ユーザー情報
     * @return 直前ページURI RedirectResponseクラス
     */
    public function unFollow(User $user)
    {
        $userInfo = auth()->user();
        // フォローしているか
        $isFollowing = $userInfo->isFollowing($user->id);
        if($isFollowing) {
            // フォローしていればフォローを解除する
            $userInfo->unFollow($user->id);
            return back();
        }
        return back();
    }
}
