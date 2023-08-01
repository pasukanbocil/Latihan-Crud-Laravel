<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassCreateRequest extends FormRequest
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
            'name' => 'required',
            'teacher_id' => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'teacher_id' => 'Wali Kelas'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama Kelas Wajib Di Isi Dengan Benar',
            'teacher_id.required' => 'Wali Kelas Wajib Di Isi Dengan Benar'
        ];
    }
}
