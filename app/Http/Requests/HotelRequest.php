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
        switch ($this->method()) {
            case 'POST': 
            {
                return [
                    'name' => 'required|unique:hotels'
                ];
            } 
            case 'PUT':
            {
                return [];
            }    
            case 'PATCH':
            {
                return []; 
            }
            case 'GET':
            {
                return [];
            }
            case 'DELETE':
            {
                return []; 
            }
            default:
            {
                return []; 
            }
        } 
    }
}
