<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'    => 'required|min:3|max:200|unique:blog_posts',
            'slug'      => 'max:200',
            'excerpt'      => 'max:500',
            'content_raw' => 'required|string|max:10000|min:3',
            'category_id' => 'required|integer|exists:blog_categories,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'title required',
            'content_raw.min'   =>  'min length [:min]'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'TITLE'
        ];
    }
}
