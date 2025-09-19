<?php

namespace App\Filament\Resources\Votes\VoteResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVoteRequest extends FormRequest
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
			'begins_at' => 'required',
			'ends_at' => 'required',
			'active' => 'required'
		];
    }
}
