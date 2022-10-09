<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|min:3|string|max:200',
            'category_id'=>'required',
            'description'=>'required',
            'yt_iframe'=>'required|string|nullable',
            'meta_title'=>'required|string|max:200',
            'meta_description'=>'required|string|max:200',
            'meta_keyword'=>'required|string',
           
            'status'=>'nullable',
        ];
    }
}
