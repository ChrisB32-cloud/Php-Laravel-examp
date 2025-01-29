<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostControler extends Controller
{
    public function createPost(Request $request)
    {
        $incomingFeilds = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        
        $incomingFeilds['title'] = strip_tags($incomingFeilds['title']);
        $incomingFeilds['body'] = strip_tags($incomingFeilds['body']);
        $incomingFeilds['user_id'] = auth()->id();
        Post::create($incomingFeilds);
        return redirect('/');

    }
}
