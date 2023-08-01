<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
            'nis' => 'unique:students|max:8|required',
            'name' => 'max:50|required',
            'gender' => 'required',
            'class_id' => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'class_id' => 'Kelas'
        ];
    }
    public function messages()
    {
        return [
            'nis.required' => 'NIS Wajib Di Isi Dengan Benar',
            'nis.max' => 'NIS Maksimal :max Karakter',
            'nis.unique' => 'NIS Sudah Terdaftar',
            'name.required' => 'Nama Wajib Di Isi Dengan Benar',
            'name.max' => 'Nama Maksimal :max Karakter',
            'gender.required' => 'Jenis Kelamin Wajib Di Isi Dengan Benar',
            'class_id.required' => 'Kelas Wajib Di Isi Dengan Benar'
        ];
    }
}
