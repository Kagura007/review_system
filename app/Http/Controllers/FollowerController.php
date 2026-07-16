<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Follower;

class FollowerController extends Controller
{
    public function follow($id): RedirectResponse
    {

        $followerId = Auth::id();

        // 自分をフォローできないようにする
        if ($followerId == $id) {
            return redirect()->back()->with('error', '自分自身はフォローできません');
        }

        // すでにフォローしているかチェック
        $already = Follower::where('user_id', $id)
            ->where(
                'follower_id',
                $followerId
            )
            ->exists();

        if (!$already) {
            Follower::create([
                'user_id' => $id,
                'follower_id' => $followerId
            ]);
        }

        return redirect()->back()->with('success', 'フォローしました');
    }


    public function unfollow($id): RedirectResponse
    {

        $followerId = Auth::id();

        Follower::where('user_id', $id)
            ->where('follower_id', $followerId)
            ->delete();

        return redirect()->back()->with('success', 'フォローを解除しました');
    }
}
