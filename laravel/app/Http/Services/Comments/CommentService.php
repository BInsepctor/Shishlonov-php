<?php

namespace App\Http\Services\Comments;

use App\Models\Comments\Comment;
use Illuminate\Support\Facades\Validator;

class CommentService
{
    public function createComment(array $data)
    {
        $this->validateCommentData($data);
        
        return Comment::create($data);
    }

    protected function validateCommentData(array $data)
    {
        $validate = [
            'content' => 'required|string',
            'post_id' => 'required|integer',
            'user_id' => 'required|integer',
        ];

        return Validator::make($data, $validate)->validate();
    }
}