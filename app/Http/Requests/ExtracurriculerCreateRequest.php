<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtracurriculerCreateRequest extends FormRequest
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
            'name' => 'unique:extracurriculers|required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama Ekstrakurikuler Wajib Di Isi Dengan Benar',
            'name.unique' => 'Nama Ekstrakurikuler Sudah Terdaftar'
        ];
    }
}
