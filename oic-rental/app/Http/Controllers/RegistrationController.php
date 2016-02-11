<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use BaseController;

class RegistrationController extends Controller
{
    public function index()
	{
		$data = [];

 		$student = DB::table('student')->where('student_number', 'b4142')->first();
 		$item = DB::table('item')->where('item_id', '1')->first();
 		$data["student_name"] = $student->student_name;
 		$data["item_name"] = $item->item_name;
        // view関数の第２引数に配列を渡す
    
    	return view('registration', $data);
	}
}
