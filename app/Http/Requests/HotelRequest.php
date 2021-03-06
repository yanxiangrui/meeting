<?php

namespace App\Http\Requests;

class HotelRequest extends Request 
{ 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->route('hotel')) {
            $id = $this->route('hotel')->id; //获取当前需要排除的id
        } else {
            $id = 0; 
        }
        return [
            'name' => 'required|unique:hotels,name,'. $id 
        ];
    }
}
