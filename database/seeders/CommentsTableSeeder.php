<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function(User $commentator) {
            User::all()->each(function(User $user) use ($commentator) {
                if ($commentator->id !== $user->id) {
                    $comment = Comment::factory()->make();
                    $comment->user()->associate($user->id);
                    $comment->commentator()->associate($commentator->id);
                    $comment->save();
                }
            });
        });
    }
}
