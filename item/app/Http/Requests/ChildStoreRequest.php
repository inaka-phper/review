<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ChildStoreRequest extends Request
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
            'name' => 'required|between:1,100',
            'birth' => 'date_format:Y-m-d',
            'plan' => 'date_format:Y-m-d',
            'gender' => 'in:male,female',
        ];
    }
}
