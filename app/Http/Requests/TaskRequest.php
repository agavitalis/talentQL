<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'task' => 'required|string',
            'description' => 'required|string|min:6',
            'start_time'=>'required|date',
            'end_time'=>'date',
        ];
    }
    

    
     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'task.required' => 'Task name is required!',
            'description.required' => 'A task must have a good description!',
        ];
    }

}
