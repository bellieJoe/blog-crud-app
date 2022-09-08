<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function store(Request $request)
    {
        Like::create([
            'user_id' => $request->user_id,
            'blog_id' => $request->blog_id
        ]);

        return back();
    }

    public function destroy($blog_id, $user_id)
    {
        $like = Like::where([
            'user_id' => Auth::user()->user_id,
            'blog_id' => $blog_id
        ])->delete();

        return back();
    }
}
