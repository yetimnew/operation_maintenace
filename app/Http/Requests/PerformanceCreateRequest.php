<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerformanceCreateRequest extends FormRequest
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
            'trip' => 'required',
            'chinet' => 'required',
            'fo' => 'required|unique:performances,FOnumber',
            'operation' => 'required',
            'truck' => 'required',
            'ddate' => 'required|date',
            'origion' => 'nullable',
            'destination' => 'different:origion',
            'diswc' => 'nullable|numeric',
            'diswoc' => 'nullable|numeric',
            'tonkm' => 'required|numeric',
            'cargovol' => 'required|numeric',
            'fuell' => 'nullable|numeric',
            'fuelb' => 'nullable|numeric',
            'perdiem' => 'nullable|numeric',
            'wog' => 'nullable|numeric',
            'other' => 'nullable|numeric',
            'comment' => '',
    
        ];
    }
}
