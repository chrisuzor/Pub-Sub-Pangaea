<?php

namespace App\Http\Requests;

use App\Http\Helpers\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateSubscriptionRequest extends FormRequest
{

    const VALIDATION_MESSAGE = 'Create Subscription Validation Failed';
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
            'url' => 'required|url',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            Response::failedValidationResponse(self::VALIDATION_MESSAGE, $validator->errors())
        );
    }
}
