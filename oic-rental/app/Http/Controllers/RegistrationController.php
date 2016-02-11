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
        $data["student_name"] = "Luke";
        $data["item_name"] = "Skywalker";
 		
 		$student = DB::table('student')->where('student_number', 'b4142')->first();

 		$data["student_name"] = $student->student_name;

 		$item = DB::table('item')->where('item_id', '1')->first();
 		$data["item_name"] = $item->item_name;
        // view関数の第２引数に配列を渡す
        return view('registration', $data);
	}
}
