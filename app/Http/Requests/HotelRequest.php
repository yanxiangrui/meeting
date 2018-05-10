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

        return [
            'name' => 'required|unique:hotels'
        ];

        switch ($this->method()) {
            case 'POST': 
            {
                
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
