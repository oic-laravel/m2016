<?php
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| ルートファイル
|--------------------------------------------------------------------------
|
| ここでアプリケーションのルートを全て登録してください。
| 簡単です。ただ、Laravelへ対応するURIと、そのURIがリクエスト
| されたときに呼び出されるコントローラーを指定してください。
|
*/
/*Route::post('/registration', function() {
	//$student_number = Input::get('student-number');
	//return Input::all();//"student_number : {$student_number}";
	//return DB::select('select * from student');
	return view('registration');
});*/

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('/index');
});

Route::get('/student_registration_form', 'UserController@showStudentForm');

Route::post('/student_registration', 'UserController@storeStudent');

Route::get('/item_registration_form', 'UserController@showItem');

Route::get('/item_return_form',function()
	{
		return view('item_return_form');
	});
Route::post('/item_return','UserController@Restore');

Route::get('/lendhistory', 'UserController@showHistory');
Route::post('/lendhistory/delete/{id}','UserController@delete');

Route::post('/registration', 'UserController@storeRental');

Route::post('/item_registration', 'UserController@storeItem');

/*
|--------------------------------------------------------------------------
| アプリケーションのルート
|--------------------------------------------------------------------------
|
| このルートグループは、"web"ミドルウェアグループが指定された
| 全ルートに対し適用されます。"web"ミドルウェアグループは
| HTTPカーネルで定義されており、セッションの開始やCSRF保護などを含んでいます。
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
