 <?php

namespace App\Http\Controllers;

// use App\Http\Requests;
// use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\HocSinh; 

class HocSinhController extends Controller
{
    public function index(){
    	// echo"Day la trang danh sach";
    	$hocsinh=HocSinh::all();
    	// print_r($hocsinh);
    	return view('restful.list',compact('hocsinh'));
    }

    public function create(){
    	// echo"Day la form du lieu";
    	return view('restful.add');
    }

    public function show($id){
    	echo"Day la dong du lieu thu $id";
    }

    public function edit($id){
    	// echo"Day la form dung de update du lieu cua dong du lieu thu $id";
    	$data=HocSinh::find($id);
     	return view('restful.edit',compact('data'));

    }

    public function store(Request $request){
    	$hocsinh=new HocSinh;
    	$hocsinh->hoten=$request->txtHoTen;
    	$hocsinh->toan=$request->txtToan;
    	$hocsinh->ly=$request->txtLy;
    	$hocsinh->hoa=$request->txtHoa;
    	$hocsinh->save();
    	return redirect->route('hocsinh.index');

    	//
    }

    public function update($id, Request $request){
    	$hocsinh=HocSinh::find($id);
    	$hocsinh->hoten=$request->txtHoTen;
    	$hocsinh->toan=$request->txtToan;
    	$hocsinh->ly=$request->txtLy;
    	$hocsinh->hoa=$request->txtHoa;
    	$hocsinh->save();
    	return redirect()->route('hocsinh.index');
    }

    public function destroy($id){
    	$hocsinh=HocSinh::findOrFail($id);
    	$hocsinh->delete();
    	return redirect()->route('hocsinh.index');

    	
    }
}
