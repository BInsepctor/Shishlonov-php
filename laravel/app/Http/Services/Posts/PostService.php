<?php

namespace App\Http\Services\Posts;

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
        $this->validatePostData($data);
        
        return Post::create($data);
    }

    public function updatePost(string $id, array $data)
    {
        $this->validatePostData($data);
        $post = $this->getPostById($id);
        $post->update($data);
        return $post;
    }

    // public function deletePost(string $id)
    // {
    //     $post = $this->getPostById($id);
    //     return $post->delete();
    // }

    protected function validatePostData(array $data)
    {
        $validate = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|integer'
        ];

        return Validator::make($data, $validate)->validate();
    }
}