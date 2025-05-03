<?php

namespace App\Services\Comments;

use App\Models\Comments\Comment;
use Illuminate\Support\Facades\Validator;

class CommentService
{
    public function createComment(array $data)
    {    
        return Comment::create($data);
    }

}