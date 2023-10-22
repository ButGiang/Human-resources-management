<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class insuranceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'staff' => 'required',
            'insurance_id' => 'required|numeric|unique:insurance',
            'registration_date' => 'required|date|before_or_equal:' . Carbon::now()->format('Y-m-d'),
            'register_place' => 'required',
            'hospital' => 'required'
        ];
    }
}
