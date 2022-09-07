<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function store(Request $request)
    {
        Like::create([
            'user_id' => $request->user_id,
            'blog_id' => $request->blog_id
        ]);
    }

    public function destroy($user_id, $blog_id)
    {
        Like::where([
            'user_id' => $user_id,
            'blog_id' => $blog_id
        ])->delete();
    }
}
