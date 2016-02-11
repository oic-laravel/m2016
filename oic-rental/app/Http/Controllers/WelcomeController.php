<?php

namespace App\Http\Controllers;


class WelcomeController extends Controller {
 
	/**
	 * 新しいコントローラーインスタンスの生成
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}
 
	/**
	 * アプリケーションのウェルカムページをユーザーへ表示
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}
 
}
