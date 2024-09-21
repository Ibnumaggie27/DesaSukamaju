<?php

namespace App\Http\Requests\CMS\Berita;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'tipe' => 'required',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'gambar.dimensions' => 'Lebar gambar thumbnail terlalu besar pastikan tidak melebihi dari 1000px'
    //     ];
    // }
}
