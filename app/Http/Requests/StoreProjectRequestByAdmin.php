<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreProjectRequestByAdmin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('doctors')->check();
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
            "proposal"=>"nullable|file|mimes:pdf|max:10000",
        ];
    }
}
