<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class siswaInput extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules(): array
    {
        return [
            "nama"=>"required|min:4|unique:siswas",
            "alamat"=>"required"
        ];
    }

    public function messages(): array
    {
        return [
            "nama.required"=>"masukkan nama anda",
            "nama.min"=>"minimal panjang huruf nama adalah 4",
            "alamat.required"=>"masukkan alamat anda"
        ];
    }
}
