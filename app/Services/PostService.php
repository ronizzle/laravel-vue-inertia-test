<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class PostService
{
    public function truncatePostsTable()
    {
        Post::truncate();
    }

    public function createPost(User $user, array $data) : Post
    {
        $post = Post::create([
            'user_id' => $user->getId(),
            'title' => $data['title'],
            'body' => $data['body'],
        ]);

        return $post;
    }

    public function getPosts()
    {
        return Post::with('user')->get();
    }

    public function getPostById(int $id) {
        return Post::with('user')->find($id);
    }
}
