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