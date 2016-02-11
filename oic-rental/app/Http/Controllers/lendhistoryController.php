<?php

namespace App\Http\Controllers;
use DB;
use BaseController;


class lendhistoryController extends Controller {
 
	public function index()
	{
		$data = [];
        $data["item_name"] =  "BarcodeReader" ;    
        $data["student_number"] = "B4123";
		$data["complete_flug"] = "OK";
		return view('lendhistory',$data);
	}
 
}
