<?php

namespace App\Filament\Resources\Supporters\SupporterResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSupporterRequest extends FormRequest
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
			'email' => 'required',
			'phone' => 'required',
			'first_name' => 'required',
			'last_name' => 'required'
		];
    }

}
