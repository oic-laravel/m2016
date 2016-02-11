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


Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/gridview', function() {
	return view('gridview');
});

Route::post('/', function() {
	//$student_number = Input::get('student-number');
	//return Input::all();//"student_number : {$student_number}";
	return DB::select('select * from student');
});

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
