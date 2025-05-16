<?php

namespace App\Http\Requests\UserTag;

use Illuminate\Foundation\Http\FormRequest;

class AttachUserTagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tag_id' => ['required'],
            'tag_id.*' => ['exists:tags,id'],
        ];
    }
}
