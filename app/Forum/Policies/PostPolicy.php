<?php

namespace Riari\Forum\Policies;

use Illuminate\Support\Facades\Gate;
use Riari\Forum\Models\Post;

class PostPolicy
{
    /**
     * Permission: Edit post.
     *
     * @param  object  $user
     * @param  Post  $post
     * @return bool
     */
    public function edit($user, Post $post)
    {
        return false;
    }

    /**
     * Permission: Delete post.
     *
     * @param  object  $user
     * @param  Post  $post
     * @return bool
     */
    public function delete($user, Post $post)
    {
        return false;
    }
}
