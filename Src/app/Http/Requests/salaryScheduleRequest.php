<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class salaryScheduleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'position' => 'required',
            'money' => 'required|numeric|between:1000000, 50000000',
        ];
    }
}
