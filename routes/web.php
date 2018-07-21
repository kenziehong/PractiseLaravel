<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/

use App\posts;
use App\tasks;
use Illuminate\Http\Request;


Route::get('/','HomeController@showWelcome');

Route::get('/insert', function() {
	DB::insert("INSERT INTO posts(title,body,is_admin) VALUES(?,?,?)",['PHP with Laravel','Laravel is the best framework!',0]);
	return 'Done';
} );

Route::get('/read',function(){
	$selected=DB::select('SELECT * FROM posts WHERE id=?',[1]);
	// return $selected;
	foreach($selected as $post){
		return $post->body;
	}
});

Route::get('update',function(){
	$updated = DB::update('UPDATE posts SET title="New title hihi" WHERE id>?',[1]);
	return $updated;
});

Route::get('delete',function(){
	$deleted = DB::delete('DELETE FROM posts WHERE id=?',[3]);
	return $deleted;
});

Route::get('readAll',function(){
	$post=posts::all();
	foreach($post as $p){
		echo $p->title." ".$p->body;
		echo "<br>";
	}
});

Route::get('findID',function(){
	$posts=posts::where('id','>=',1)
	 ->where('title','PHP with Laravel')
	 ->where('body','like','%new one')
	 ->orderBy('id','desc')
	 ->take(10)
	 ->get();

	 foreach($posts as $p){
	 	echo $p->title." ".$p->body;
	 	echo "<br>";
	 }
});

Route::get('insertORM',function(){
	$p=new posts;
	$p->title='insert ORM';
	$p->body='INSERTED done ORM';
	$p->is_admin='1';
	$p->save();
});

Route::get('updateORM',function(){
	$p=posts::where('id',10)->first();
	$p->title='updated ORM';
	$p->body='updated Ahihi done done';
	$p->save();
});

Route::get('deleteORM',function(){
	posts::where('id','>=',20)
		->delete();
});

Route::get('destroyORM',function(){
	posts::destroy([7,11]);
});


//Show Task Dashboard

Route::get('/hometask',function(){

	$t=tasks::orderBy('created_at','desc')->get();
	return view('tasks',['tasks'=>$t]);
});

//Add New Task

Route::post('/taskk',function(Request $request){

	$validator= Validator::make($request->all(),[
		'name'=>'required|max:255'
	]);

	if($validator->fails()){
		return redirect('/hometask')
		     ->withInput()
		     ->withErrors($validator);
	}

	$ta = new tasks;
	$ta->name=$request->name;
	$ta->save();
	return redirect('/hometask');

});

//Delete Task

// Route::delete('/task/{k}', function($id){
// 	tasks::findOrFail($id)->delete();
// 	return redirect('/hometask');
// });

Route::delete('/taskk/{tas}', function(tasks $tas){
	$tas->delete();
	return redirect('/hometask');
});


// Laravel Khoa Pham


Route::get('ho-chi-minh',['as'=>'hcm',function(){
	return "Ho Chi Minh dep lam";
}]);

Route::get('testAction','HomeController@testController');

Route::group(['prefix'=>'mon-an'],function(){
	Route::get('bun-mang/{ten}/{luc?}',function($ten,$luc="kb"){
		return "Day la Bun mang $ten. $luc";
	})
	->where(['ten'=>'[a-zA-Z]+','luc'=>'[0-9]{2}']);

	Route::get('bun-bo/{ten}/{luc}',function($ten,$luc){
		return "Day la $ten. $luc";
	});

});

Route::get('testsub1', function(){
	return view('layouts.sub1');
});

Route::get('testsub2', function(){
	return view('layouts.sub2');
});

View::share('titlesub','Lap trinh Laravel');
View::composer(['layouts.sub1','layouts.sub2'],function($view){
	return $view->with('thongtin','Day la trang ca nhan');
});

Route::get('check-view', function(){
	if(View()->exists('layouts.sub3')){
		return"Ton Tai View";
	} 

	else{
		return"Khong Ton Tai View";
	}
});

Route::get('goi-master', function(){
	return view('layouts.sub1');
});

Route::get('lay_url',function(){
	return URL::full();
});

Route::get('url/to', function(){
	return URL::to('mon-an/bun-mang',['anhhong','12'],true);
});

Route::get('url/secure', function(){
	return secure_url('mon-an/bun-mang',['anhhong','12']);
});

//Schema Build


Route::get('schema/create', function(){

	Schema::create('khoapham',function($table){
		$table->increments('id');
		$table->string('tenmonhoc');
		$table->integer('gia');
		$table->text('ghichu')->nullable();
		$table->timestamps();
	});
});

Route::get('schema/change',function(){
	Schema::rename('khoapham','kpt');
});

Route::get('schema/delete',function(){
	Schema::dropIfExists('kpt');
});

Route::get('schema/change_attr',function(){
	Schema::table('khoapham',function($table){
		$table->string('tenmonhoc',50)->change();
	});
});


Route::get('schema/drop/column',function(){
	Schema::table('khoapham',function($table){
		$table->dropColumn(['id','tenmonhoc']);
	});
});


Route::get('schema/create/cate', function(){

	Schema::create('category',function($table){
		$table->increments('id');
		$table->string('name');
		$table->timestamps();
	});
});

Route::get('schema/create/product', function(){

	Schema::create('product',function($table){
		$table->increments('id');
		$table->string('name');
		$table->integer('price');
		$table->integer('cate_id')->unsigned();
		$table->foreign('cate_id')->references('id')->on('category')->onDelete('cascade');
		$table->timestamps();
	});
});


//Query Builder

Route::get('query/select-all', function(){
	$data=DB::table('product')->get();
	echo"<pre>";
	print_r($data);
	echo"</pre>";
});

Route::get('query/select-column', function(){
	$data=DB::table('product')->select('name')->where('id',4)->get();
	echo"<pre>";
	print_r($data);
	echo"</pre>";
});

Route::get('query/select-whereor', function(){
	$data=DB::table('product')->where('cate_id',1)->orwhere('id',4)->get();
	echo"<pre>";
	print_r($data);
	echo"</pre>";
});

Route::get('create/product1',function(){
	Schema::create('product1',function($table){
		$table->increments('id');
		$table->string('name');
		$table->integer('cate_id');
		$table->timestamps();
	});
});

Route::get('query/join',function(){
	$data=DB::table('product1')->select('name','intro')->join('product2','product1.cate_id','=','product2.id')->get();
	echo"<pre>";
	print_r($data);
	echo"</pre>";
});

Route::get('query/insert', function(){
	$data=DB::table('product2')->insert([
		['intro'=>'Web'],
		['intro'=>'MobileAdroid'],
		['intro'=>'MobileIos'],
	]);
	echo $data;
});

Route::get('query/insert-get-id', function(){
	$id=DB::table('product2')->insertGetId([
		'intro'=>'Mobile'
	]);
	echo $id;
});

Route::get('query/update', function(){
	DB::table('product2')->where('id','<',5)->update([
		'intro'=>'Mobile'
	]);
	return "Update thanh cong";
});

Route::get('query/delete', function(){
	DB::table('product2')->where('id','>',8)->delete();
	return "Delete thanh cong";
});

Route::get('query/count', function(){
	$count=DB::table('product2')->count();
	return $count;
});

Route::get('query/min', function(){
	$min=DB::table('product2')->min('id');//max,avg,sum tuong tu
	return $min;
});

Route::get('model/select-all',function(){
	$data=App\product2::all()->tojSon();
	echo"<pre>";
	print_r($data);
	echo"</pre>";
});


Route::get('model/select-id',function(){
	$data=App\product2::find(2)->toArray();//findOrFail tra ve loi
	echo"<pre>";
	print_r($data);
	echo"</pre>";
});

Route::get('model/take',function(){
	$data=App\product2::where('intro','Mobile')->firstOrFail()->take(2)->get()->toArray();
	echo"<pre>";
	print_r($data);
	echo"</pre>";
});

Route::get('model/raw',function(App\product2 $product){
	$data=$product::whereRaw('intro = ? AND id = ?',['Mobile',1])->select('intro')->get()->toArray();
	echo"<pre>";
	print_r($data);
	echo"</pre>";
});

//Them 2 cot vao product2, refresh lai, du lieu truoc do mat sach

Route::get('model/insert1', function(){
	$data = new App\product2;
	$data->intro="Web B";
	$data->price=20000;
	$data->cate_id=1;
	$data->save();
	echo "Finish!!!";
});



//Bi loi: MassAssignmentException in Model.php line 444:intro, chua thuc hien duoc
Route::get('model/insert2', function(){
	$data=array(
		'intro'=>'Web B',
		'price'=>50000,
		'cate_id'=>2
	);
	App\product2::create($data);
});

Route::get('model/destroy', function(){

	App\product2::destroy(1);
});


Route::get('relation/one-many-1', function(){
	$data=App\product2::find(1)->images()->get()->toArray();
	echo"<pre>";
	print_r($data);
	echo"</pre>";
});

Route::get('schema/change_name_column', function(){
	Schema::table('car_colors', function ($table) {
    $table->renameColumn('color_id', 'colors_id');
});
});

Route::get('relation/one-many-2', function(){
	$data=App\images::find(1)->product2()->get()->toArray();
	echo"<pre>";
	print_r($data);
	echo"</pre>";
});

Route::get('relation/many-many-1', function(){
	$data=App\cars::find(4)->colors()->get()->toArray();
	echo"<pre>";
	print_r($data);
	echo"</pre>";
}); 

Route::get('relation/many-many-2', function(){
	$data=App\colors::find(4)->cars()->select('name')->get()->toArray();
	echo"<pre>";
	print_r($data);
	echo"</pre>";
}); 

Route::get('form/layout', function (){
	return view('form.layout');
});


//Bai 36
Route::get('form/dang-ky', function(){
	return view('form.dangky');
});

Route::post('form/dang-ky-thanh-vien',['as'=>'postDangKy','uses'=>'KhoaPhamController@them']);
// Route::any('{all?}','HomeController@showWelcome')->where('all','(.*)');

//Bai 42 - tim hieu ve Response

Route::get('response/basic',function(){
	return "Dao tao tin hoc khoa pham";
});

Route::get('response/json',function(){
	$arr=array(
		'monhoc'=>'Laravel Framework 5.x',
		'giang vien'=>'Mr Vu Quoc Tuan',
		'thoi gian'=>'2 thang'
	);
	return Response::json($arr);
});

//khong duoc ' <?xml
Route::get('response/xml', function(){
	$content = '<?xml version="1.0" encoding="UTF-8"?> 
	<root>
		<trungtam>Khoa Pham Training</trungtam>
		<danhsach>
			<monhoc>Lap trinh PHP</monhoc>
			<monhoc>Lap trinh Java</monhoc>
		</danhsach>
	</root>
	';

	$status=200;
	$value='text/xml';
	return response($content,$status)->header('Content-Type',$value);
});


Route::get('response/demo',['as'=>'resdemo',function(){
	return view('response.demo');
}]);

Route::get('response/redirect',function(){
	// return redirect('response/json');
	return redirect()->route('resdemo')->with([
		'level'=>'inf',
		'message'=>'Chao ban day la thong bao nguy hiem'	  
	]);
});

Route::get('response/redirect/back',function(){
	
	return redirect()->back();
});

Route::get('response/download',function(){
	$url="download/demo.rar";
	return Response::download($url);
});

Route::get('response/downloadAndDelete',function(){
	$url="download/demo.rar";
	return Response::download($url)->deleteFileAfterSend(true);
});

Route::get('response/macro/cap', function(){
	return response()->cap('khoa hoc lap trinh laravel');
});

Route::get('response/macro/contact', function(){
	return response()->contact('http://hongtravel.com/response/macro/cap');
});

//Ba 45 Tim hieu Authentication

Route::get('authen/login',['as'=>'getLogin','uses'=>'ThanhVienController@getLogin']);
Route::post('authen/login',['as'=>'postLogin','uses'=>'ThanhVienController@postLogin']);