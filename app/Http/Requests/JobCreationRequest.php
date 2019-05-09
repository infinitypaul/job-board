<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobCreationRequest extends FormRequest
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
            'job_title' => 'required',
            'job_type' => 'required',
            'job_category' => 'required',
            'location' => 'required',
            'job_description' => 'required',
            'min_salary' => 'required|numeric',
            'max_salary' => 'required|numeric',
            'document' => 'required|mimes:pdf',
        ];
    }
}
