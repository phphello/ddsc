<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Route;

class test5 extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'name' => 'required',
            'password' => 'required'
        ];
    }
    
     public function failedValidation(Validator $validator)
    {
         exit(json_encode(array(
            'success' => false,
            'message' => 'There are incorect values in the form!',
            'errors' => $validator->getMessageBag()->toArray()
        )));
    }
}
