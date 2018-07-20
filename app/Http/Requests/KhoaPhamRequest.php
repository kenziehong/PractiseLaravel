<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhoaPhamRequest extends FormRequest
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
            'txtMonHoc'=>'required|unique:kpt_khoaphams,monhoc',
            'txtGiaTien'=>'required',
            'txtGiangVien'=>'required',
            'fImages'=>'required|image|max:100',            
        ];
    }

    public function messages(){
        return
        [
            'txtMonHoc.required'=>'Vui long nhap ten mon hoc',
            'txtGiaTien.required'=>'Vui long nhap gia tien',
            'txtGiangVien.required'=>'Vui long nhap ten giang vien',
            'fImages.required'=>'Vui long nhap hinh',
            'txtMonHoc.unique'=>'Ten mon hoc nay da ton tai'
        ];

    }
}
