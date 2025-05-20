<?php

namespace App\Services\Posts;

use App\Jobs\PostStoreJob;
use App\Models\Posts\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;


class PostService
{
    public function getAll()
    {
        return Post::all();
    }

    public function getById(string $id)
    {
        return Post::findOrFail($id);
    }

    public function getPostWithComments(string $id)
    {
        return Post::with(['user', 'comments.user'])->findOrFail($id);
    }

    public function create(array $data)
    {
        $post = Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => $data['user_id']
        ]);
        
    
        if (isset($data['image'])) {
            $post->addMedia($data['image']->getPathname())
                 ->usingFileName($data['image']->getClientOriginalName())
                 ->toMediaCollection('posts');
        }
        return $post;
    }

    public function update(string $id, array $data)
    {
        $post = $this->getById($id);
        $post->update($data);
        return $post;
    }

    // public function deletePost(string $id)
    // {
    //     $post = $this->getPostById($id);
    //     return $post->delete();
    // }


}
