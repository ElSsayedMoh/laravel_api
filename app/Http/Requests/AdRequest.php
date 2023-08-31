<?php

namespace App\Http\Requests;

use App\Helper\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class AdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        if($this->is('api/*')){      // <=    get any url use api
            $response = ApiResponse::sendResponse(422 , 'Validation Error' , $validator->errors());     // you can return just messages => $validator->messages()->all() 
            throw new ValidationException($validator ,$response);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'     => 'required',
            'slug'      => 'required',
            'text'      => 'required',
            'phone'     => 'required',
            'domain_id' => 'required|exists:domains,id',
        ];
    }
}
