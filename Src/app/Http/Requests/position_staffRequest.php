<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class position_staffRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'staff' => 'required',
            'degree' => 'required',
        ];
    }
}
