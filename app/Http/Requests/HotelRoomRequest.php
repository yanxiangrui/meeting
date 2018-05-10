<?php

namespace App\Http\Requests;

class HotelRoomRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hotel_id' => 'required',
            'hotel_room_type_id' => 'required',
            'hotel_number' => 'required',
        ]; 
    }


    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'hotel_id.required' => '请选择酒店！',
            'hotel_room_type_id.required' => '请选择酒店房型！',
            'hotel_number.required' => '请填写房号！',
        ];
    }
}
