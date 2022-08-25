<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('students')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:projects,name,'.$this->projects_id,
            'description'=>'required|unique:projects,description,'.$this->projects_id,
            'doctor'=>'required|exists:doctors,id',
            "proposal"=>"required|file|mimes:pdf|max:10000",
            'students'=>"required|array|distinct|min:2|max:6|exists:students,student_ID",
            'students.*'=>"required|distinct|exists:students,student_ID",
            "last_semester_id"=>"required|exists:semesters,id"
        ];
    }
}
