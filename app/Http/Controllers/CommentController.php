<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\CreateComment;

class CommentController extends Controller
{
    public function index(User $user)
    {
        return view('users.comments', [
            'user' => $user,
        ]);
    }

    public function create(CreateComment $request, User $user)
    {
        $this->authorize('createComment', $user);
        
        $validated = $request->validated();
        $comment = Comment::make([
            'text' => $validated['text'],
        ]);
        
        $comment->user()->associate($user);
        $comment->commentator()->associate(auth()->id());

        $comment->save();

        return redirect()->route('users.comments', ['user' => $user->id])
                         ->withStatus("You have commented on user '{$user->full_name}'");
    }
}
