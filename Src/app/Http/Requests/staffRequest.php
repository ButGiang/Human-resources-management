<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class staffRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:50',
            'birthday' => 'required|date|before:' . Carbon::now()->subYears(18)->format('Y-m-d'),
            'gender' => 'required',
            'CCCD' => 'required|numeric|unique:staffs',
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:staffs',
            'recruit_day' => 'required|date|before_or_equal:' . Carbon::now()->format('Y-m-d'),
        ];
    }
}
