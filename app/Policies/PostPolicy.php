<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class MyPostPolicy
{
    public function view(User $user, Post $post)
    {
        if ($user->id === $post->user_id) {
            return true;
        }

        if ($user->can('view-posts')) {
            return true;
        }

        return false;
    }
}
