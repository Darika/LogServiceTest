<?php

namespace App\Http\Requests;

use App\Enums\LogLevelsEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class LogRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'client' => 'required|string',
            'message' => 'required|string',
            'level' => [Rule::enum(LogLevelsEnum::class)],
            'user_id' => 'required|integer',
            'created_at' => 'required|date'
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     * @throws \HttpResponseException
     */
    public function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'errorMessage' => $validator->errors()->getMessages()
        ]));
    }
}
