<?php

namespace App\Http\Controllers;
use DB;
use BaseController;


class lendhistoryController extends Controller {
 
	public function index()
	{
        $data1["item_name"] =  "BarcodeReader"       
        $data2["student_number"] = "B4123";
		$data3["complete_flug"] = "OK";
		return view('lendhistory',$data);
	}
 
}
