<?php

namespace App\Http\Requests;

class HotelDinnerRequest extends Request 
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'price' => 'required|numeric',
        ];
    }
}
