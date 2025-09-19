<?php

namespace App\Filament\Resources\Donations\DonationResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDonationRequest extends FormRequest
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
			'uuid' => 'required',
			'type' => 'required',
			'amount' => 'required|numeric',
			'supporter_id' => 'required|integer'
		];
    }
}
