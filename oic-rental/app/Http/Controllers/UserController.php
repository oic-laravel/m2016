<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use View;
use BaseController;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
    * アイテム貸出
    *
    * URI : GET /registation
    * @author hide
    * @return array
    */
    public function store()
	{
		date_default_timezone_set('Asia/Tokyo');
		$today = date("Y/m/d");
		$return_plan_day = date("Y/m/d",strtotime("+1 week"));


		$student_number = Input::get('student-number');
		$item_number = Input::get('loan-number');
		$data = [];

 		$student = DB::table('student')->where('student_number', '=', $student_number)->first();
 		$item = DB::table('item')->where('item_number', '=', $item_number)->first();
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

    /**
    * 貸出履歴表示
    *
    * URI : GET /lendhistory
    * @author hisashi
    * @return array
    */
    public function show()
    {

        $data['lendhistory']=DB::table('rental')
        ->join('item', 'rental.item_id', '=', 'item.item_id')
        ->join('student', 'rental.student_id', '=', 'student.student_id')
        ->select('item.item_name', 'student.student_number','rental.completed','rental_date')
        ->orderBy('rental.rental_date', 'desc')
        ->get();
        return View::make('lendhistory',$data);
        //return View::make('lendhistory')->with('rentals',$rentals //[
        //['item_name' => 'item_id','student_number' => 'student_id','complete_flug' => 'completed'],

            //]
            //);

            //return View::make('lendhistory')->with('rental', rental::get());

            //table('rental')->get();
            /*<ul class="rentals">
            @foreach($rentals as $rental)
            <td>{{$rental['item_name']}}</td><td>{{$rental['student_number']}}</td><td>{{$rental['complete_flug']}}</td> 
            @endforeach
        </ul>*/
    }
}
