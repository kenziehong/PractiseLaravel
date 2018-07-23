<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:user,email',
            'password'=>'required',
        ];
    }

    public function message(){
        return [
            'name.required'=>'vui long nhap ho ten',
            'email.required'=>'vui long nhap email',
            'email.email'=>'Day khong phai la 1 email',
            'email.unique'=>'email nay da ton tai roi',
            'password.required'=>'vui long nhap mat khau',
        ];
    }
}
