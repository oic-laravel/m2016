<?php

namespace App\Http\Controllers;
use DB;
use BaseController;
use View;


class lendhistoryController extends Controller {
 
	public function show()
	{

 		$rentals['rentals'] = DB::select('select * from rental');
 		

        return view('lendhistory',rentals);


                //return View::make('lendhistory')->with('rentals',$rentals //[
                //['item_name' => 'item_id','student_number' => 'student_id','complete_flug' => 'completed'],

        //]
        //);

		//return View::make('lendhistory')->with('rental', rental::get());


        /*<ul class="rentals">
        @foreach($rentals as $rental)
        <td>{{$rental['item_name']}}</td><td>{{$rental['student_number']}}</td><td>{{$rental['complete_flug']}}</td> 
        @endforeach
        </ul>*/
	}
 
}