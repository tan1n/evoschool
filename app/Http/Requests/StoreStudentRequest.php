<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name'=>'required',
            'fname'=>'required',
            'mname'=>'required',
            'roll'=>'nullable',
            'class_roll'=>'nullable',
            'reg'=>'nullable',
            'group_id'=>'nullable',
            'class_id'=>'nullable',
            'section_id'=>'nullable',
            'admission_date'=>'required|date',
            'phone'=>'required',
            'address'=>'required'
        ];
    }
}
