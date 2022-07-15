<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class Request extends FormRequest
{
      /**
       * Get the error messages for the defined validation rules.*
       * @return array
       */
      protected function failedValidation(Validator $validator)
      {
            throw new HttpResponseException(response()->json([
                  'errors' => $validator->errors(),
            ], 422));
      }
}
