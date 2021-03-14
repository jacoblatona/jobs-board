<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
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
            'job_title' => 'required|string|max:255',
            'job_location' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'required|image',
            'tags' => 'required|string|max:255',
            'summary' => 'required|string'
        ];
    }
}
