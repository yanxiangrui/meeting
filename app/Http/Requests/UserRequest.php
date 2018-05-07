<?php

namespace App\Http\Requests;

class UserRequest extends Request 
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
                return [];
            } 
            case 'PUT':
            {
                return [];
            }    
            case 'PATCH':
            {
                return [
                    'password' => 'required|confirmed|min:6'
                ]; 
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
