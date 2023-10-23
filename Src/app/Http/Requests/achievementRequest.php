<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class achievementRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'date' => 'required|date|before_or_equal:' . Carbon::now()->format('Y-m-d'),
            'reward' => 'required|numeric|min:100000'
        ];
    }
}
