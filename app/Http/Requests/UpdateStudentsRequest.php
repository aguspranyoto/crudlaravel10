<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required',
            'gender' => 'required',
            'emailaddress' => [
                'required',
                Rule::unique('students','emailaddress')->ignore($this->idstudents, 'idstudents'),
                'email',
            ],
            'address' => 'required',
            'phone' => 'required|numeric',
        ];
    }
    public function messages(): array
    {
        return [
            'fullname.required' => ':attribute tidak boleh kosong',
            'gender.required' => ':attribute tidak boleh kosong',
            'emailaddress.required' => ':attribute tidak boleh kosong',
            'emailaddress.unique' => ':attribute tidak unique',
            'emailaddress.email' => ':attribute harus berbentuk email',
            'address.required' => ':attribute tidak boleh kosong',
            'phone.required' => ':attribute tidak boleh kosong',
            'phone.numeric' => ':attribute harus berupa angka',
        ];
    }

    public function attributes(): array 
    {
        return [
            'fullname' => 'Nama lengkap',
            'gender' => 'Jenis kelamin',
            'emailaddress' => 'Email',
            'address' => 'Alamat',
            'phone' => 'Nomor telepon',
        ];
    }
}
