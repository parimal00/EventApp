<?php

namespace App\Http\Requests;

use App\Rules\EventStartingDateValidator;
use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => 'required|date|after_or_equal:start_date'
        ];
    }
}
