<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'publish_city' => 'required|string|max:255',
            'publisher_id' => 'required',
            'category_id' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Title is required!',
            'code.required' => 'Code is required!',
            'author.required' => 'Author is required!',
            'genre.required' => 'Genre is required!',
            'year.required' => 'Year is required!',
            'isbn.required' => 'ISBN is required!',
            'description.required' => 'Description is required!',
            'publish_city.required' => 'Publish City is required!',
            'publisher_id.required' => 'Publisher is required!',
            'category_id.required' => 'Category is required!',
        ];
    }
}
