<?php

namespace App\Http\Requests;

class MeetingJourneyRequest extends Request 
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [ 
            'name' => 'required',
            'price' => 'required|nullable',
            'end_time' => 'nullable|date',
            'start_time' => 'nullable|date',
        ];
    }
}
