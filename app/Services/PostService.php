<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Collection;

class PostService
{
    public function truncatePostsTable() : void
    {
        Post::truncate();
    }

    public function createPost(User $user, array $data): Post
    {
        return Post::create([
            'user_id' => $user->getId(),
            'title' => $data['title'],
            'body' => $data['body'],
        ]);
    }

    public function getPosts(): Collection
    {
        return Post::with('user')->get();
    }

    public function getPostById(int $id): Post
    {
        return Post::with('user')->find($id);
    }

    public function deletePostById(int $id) : void
    {
        Post::destroy($id);
    }
}
