<?php

namespace App\Http\Requests;

class MeetingRequest extends Request 
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->route('meeting')) {
            $id = $this->route('meeting')->id;
        } else {
            $id = 0; 
        }

        return [
            'name' => 'required|unique:meetings,name,'.$id,
        ];
    }
}
