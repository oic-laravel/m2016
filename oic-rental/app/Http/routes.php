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

Route::get('/item_registration', function () {
    return view('item_registration');
});

Route::get('/lendhistory', 'lendhistoryController@show');

Route::post('/registration', 'RegistrationController@store');

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
