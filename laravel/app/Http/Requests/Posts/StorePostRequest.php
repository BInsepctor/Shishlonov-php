<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user(); 
        return $user && ($user->hasRole('admin') || $user->hasRole('editor'));
    }

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
            'image' => 'required|image',
            'user_id' => 'required|integer' 
        ];
    }
}
