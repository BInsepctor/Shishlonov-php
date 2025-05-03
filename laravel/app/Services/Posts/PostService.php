<?php

namespace App\Services\Posts;

use App\Models\Posts\Post;
use Illuminate\Support\Facades\Validator;

class PostService
{
    public function getAllPosts()
    {
        return Post::all();
    }

    public function getPostById(string $id)
    {
        return Post::find($id);
    }

    public function getPostWithComments(string $id)
    {
        return Post::with(['user', 'comments.user'])->find($id);
    }

    public function createPost(array $data)
    {
        return Post::create($data);
    }

    public function updatePost(string $id, array $data)
    {
        $post = $this->getPostById($id);
        $post->update($data);
        return $post;
    }

    // public function deletePost(string $id)
    // {
    //     $post = $this->getPostById($id);
    //     return $post->delete();
    // }

}