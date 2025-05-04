<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     $user = Auth::user();
    //     dd(Auth::user()->roles);
    //     if (!$user) {
    //         return false; 
    //     }
    
    //     if ($user->hasRole('admin')) {
    //         return true;
    //     }
    
    //     if ($user->hasRole('editor')) {
    //         return $user->id == $this->route('post')->user_id;
    //     }
        
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|integer' 
        ];
    }
}
