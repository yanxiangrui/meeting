<?php

namespace App\Http\Requests;

class HotelRoomTypeRequest extends Request
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
            'bed_total' => 'required|nullable',
            'price' => 'required|numeric',
            'bed_price' => 'required|numeric',
        ];
    }
}
