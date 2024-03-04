<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'title not required',
            'title.string' => 'title not string',
            'content.required' => 'content not required',
            'content.string' => 'content not string',
            'preview_image.required' => 'preview image not required',
            'preview_image.file' => 'preview image not file',
            'main_image.required' => 'main image not required',
            'main_image.file' => 'main image not file',
            'category_id.required' => 'category not required',
            'category_id.integer' => 'category id not integer',
            'tag_ids.array' => 'tags not array',
            'tag_ids.*.intager' => 'tag id not intager',
        ];
    }
}
