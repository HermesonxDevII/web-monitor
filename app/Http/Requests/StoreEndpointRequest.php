<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEndpointRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   
        return [
            'endpoint' => [
                'required',
                'string',
                Rule::unique('endpoints')->where('site_id', $this->siteID)
            ],
            'frequency' => 'required'
        ];
    }
}
