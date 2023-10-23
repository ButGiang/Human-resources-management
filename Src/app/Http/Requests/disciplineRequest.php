<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class disciplineRequest extends FormRequest
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
            'punish' => 'required|numeric|min:10000'
        ];
    }
}
