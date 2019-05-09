<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeRequest extends FormRequest
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
            'rate' => 'required|numeric',
            'skills' => 'required',
            'tagline' => 'required',
            'nationality' => 'required',
            'about_me' => 'required',
            'document' => 'required|mimes:pdf'
        ];
    }
}
