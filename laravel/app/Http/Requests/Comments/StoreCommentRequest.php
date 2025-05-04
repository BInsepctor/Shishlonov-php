<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return Auth::check() && (
    //         Auth::user()->hasRole('user') || 
    //         Auth::user()->hasRole('editor') || 
    //         Auth::user()->hasRole('admin')
    //     );
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content' => 'required|string',
            'post_id' => 'required|integer',
            'user_id' => 'required|integer',
        ];
    }
}
