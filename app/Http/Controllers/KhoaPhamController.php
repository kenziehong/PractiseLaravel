<?php

namespace App\Http\Controllers;

// use App\Http\Requests;
// use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\kpt_khoapham;
use App\Http\Requests\KhoaPhamRequest;

// use Validator;

class KhoaPhamController extends Controller
{
    public function them(KhoaPhamRequest $request){
    	// $v=Validator::make($request->all(),
    	// [
    	// 	'txtMonHoc'=>'required|unique:kpt_khoaphams,monhoc',
    	// 	'txtGiaTien'=>'required',
    	// 	'txtGiangVien'=>'required',
    	// ],
    	// [
    	// 	'txtMonHoc.required'=>'Vui long nhap ten mon hoc',
    	// 	'txtGiaTien.required'=>'Vui long nhap gia tien',
    	// 	'txtGiangVien.required'=>'Vui long nhap ten giang vien',
    	// 	'txtMonHoc.unique'=>'Ten mon hoc nay da ton tai'
    	// ]

    	// );
    	// if($v->fails()){
    	// 	return redirect()->back()->withErrors($v->errors());
    	// }


    	$img = $request->file('fImages');
    	$img_name = $img->getClientOriginalName();

    	$khoapham = new kpt_khoapham;
    	$khoapham->monhoc=$request->txtMonHoc;
    	$khoapham->giatien=$request->txtGiaTien;
    	$khoapham->giangvien=$request->txtGiangVien;
    	$khoapham->image=$img_name;
    	$khoapham->save();
    	
    	$des = 'upload/images';
    	$img->move($des,$img_name);

    	return redirect('form/dang-ky');

    	// echo $request->txtMonHoc."<br/>";
    	// echo $request->txtGiaTien."<br/>";
    	// echo $request->txtGiangVien."<br/>";

    	// echo "<pre>";
    	// echo "Kich thuoc :".($request->file('fImages')->getSize()." KB <br/>");

    	// echo "Ten hinh :".($request->file('fImages')->getClientOriginalName()." <br/>");

    	// echo "Duong dan :".($request->file('fImages')->getRealPath()."<br/>");
    	// echo "Loai :".$request->file('fImages')->getMimeType();
    	// echo "</pre>";


    }
}
