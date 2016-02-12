<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use BaseController;

use Illuminate\Support\Facades\Input;

class RegistrationController extends Controller
{
    public function store()
	{
		date_default_timezone_set('Asia/Tokyo');
		$today = date("Y/m/d");
		$return_plan_day = date("Y/m/d",strtotime("+1 week"));


		$student_number = Input::get('student-number');
		$item_number = Input::get('loan-number');
		$data = [];

 		$student = DB::table('student')->where('student_number', $student_number)->first();
 		$item = DB::table('item')->where('item_number', $item_number)->first();
 		$data["student_number"] = $student->student_number;
 		$data["item_name"] = $item->item_name;
 		//Trying to get property of non-object yet...
 		DB::table('rental')->insert(
    		['student_id' => $student->student_id,
    		 'item_id' => $item->item_id,
    		 'rental_date' => $today,
    		 'plan_date' => $return_plan_day,
    		 'completed' => 0
    		 ]
		);
        // view関数の第２引数に配列を渡す
    	return view('registration', $data);
	}
}
