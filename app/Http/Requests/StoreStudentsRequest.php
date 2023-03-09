<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'idstudents' => 'required|unique:students,idstudents|numeric',
            'fullname' => 'required',
            'gender' => 'required',
            'emailaddress' => 'required|email|unique:students,emailaddress',
            'address' => 'required',
            'phone' => 'required|numeric',
        ];
    }
    public function messages(): array
    {
        return [
            'idstudents.required' => ':attribute tidak boleh kosong',
            'idstudents.unique' => ':attribute tidak unique',
            'idstudents.numeric' => ':attribute harus berupa angka',
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
            'idstudents' => 'NIM',
            'fullname' => 'Nama lengkap',
            'gender' => 'Jenis kelamin',
            'emailaddress' => 'Email',
            'address' => 'Alamat',
            'phone' => 'Nomor telepon',
        ];
    }
}
