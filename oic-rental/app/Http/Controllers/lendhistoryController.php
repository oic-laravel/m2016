<?php

namespace App\Http\Controllers;
use DB;
use BaseController;
use View;


class lendhistoryController extends Controller {
 
    /**
    * 貸出履歴表示
    *
    * URI : GET /lendhistory
    * @author :hisashi
    * @return array
    */
	public function show()
	{

        $data['lendhistory']=DB::table('rental')
            ->join('item', 'rental.item_id', '=', 'item.item_id')
            ->join('student', 'rental.student_id', '=', 'student.student_id')
            ->select('item.item_name', 'student.student_number','rental.completed','rental.rental_date')
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
