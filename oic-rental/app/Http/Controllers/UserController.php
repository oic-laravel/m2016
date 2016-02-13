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
    * 貸出履歴削除
    *
    * URI : POST /lendhistory/delete/{id}
    * @param array $id
    * @author takezoe
    * @return App\Http\Controllers\UserController@showHistory
    */
    public function delete($id)
    {
        DB::table('rental')->where('rental_id', $id)->delete();

        return redirect()->to('/lendhistory');
    }

    /**
    * アイテム貸出
    *
    * URI : POST /registation
    * @author hide
    * @return array
    */
    public function storeRental()
	{
		date_default_timezone_set('Asia/Tokyo');
		$today = date("Y/m/d");
		$return_plan_day = date("Y/m/d",strtotime("+1 week"));


		$student_number = Input::get('student-number');
		$item_number = Input::get('loan-number');

        $result=DB::table('item')
        ->where('item_number','=',$item_number)
        ->where('loaned','=',1)
        ->first();
        if($result){//error! item was loaned. 
            return view('index');
        }
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

        DB::table('item')
        ->where('item_number','=',$item_number)
        ->update(['loaned' => 1]);

        // view関数の第２引数に配列を渡す
    	return view('registration', $data);
	}

    /**
    * show item list
    *
    * URI : GET /item_list
    * @author hide
    * @return void
    */
    public function showItemList()
    {
        $data['itemList'] = DB::table('item')
                     ->select(DB::raw('item_name,count(item_name) as item_count'))
                     ->groupBy('item_name')
                     ->get();

        $data['canList'] = DB::table('item')
                     ->select(DB::raw('count(loaned) as item_loaned'))
                     ->where('loaned','=',0)
                     ->get();

        //$data['itemList']=DB::table('item')
        //->select('item_name','item_number','loaned')
        //->get();
        return View::make('/item_list',$data);
    }

    /**
    * insert item name to pullbox
    *
    * URI : GET /item_registration_form
    * @author hide
    * @return array
    */
    public function showItem()
    {
        $data['itemName']=DB::table('item')
        ->select('item.item_name')
        ->distinct()
        ->get();
        return view('/item_registration_form',$data);
    }

    /**
    * insert item to database
    *
    * URI : GET /item_registration
    * @author hide
    * @return array
    */
    public function storeItem()
    {
        DB::table('item')->insert(
            ['item_name' => Input::get('item'),
             'remarks' => "test"
             ]);

        $id = DB::getPdo()->lastInsertId();

        DB::table('item')
        ->where('item_id', $id)
        ->update(['item_number' => Input::get('item').'-'.$id]);
        
        $data['item']=DB::table('item')
        ->select('item_number','item_name')
        ->where('item_id', $id)
        ->get();

        return view('/item_completed',$data);
    }

    /**
    * 貸出履歴表示
    *
    * URI : GET /lendhistory
    * @author hisashi
    * @return array
    */
    public function showHistory()
    {

        $data['lendhistory']=DB::table('rental')
        ->join('item', 'rental.item_id', '=', 'item.item_id')
        ->join('student', 'rental.student_id', '=', 'student.student_id')
        ->select('rental.rental_id', 'item.item_name', 'student.student_number','rental.completed','rental_date')
        ->orderBy('rental.rental_date', 'desc')
        ->get();
        return View::make('lendhistory',$data);
    }


    /**
    * 生徒登録
    *
    * URI : GET /student_registration_form
    * @author hisashi
    * @return array
    */
        public function showStudentForm()
    {

        $departments['departments'] = DB::table('department')->get();
        $teachers['teachers'] = DB::table('teacher')->get();
        // view関数の第２引数に配列を渡す
        return view('student_registration_form', $departments,$teachers);
    }
    /**
    * 生徒登録
    *
    * URI : POST /student_registration
    * @author hisashi
    * @return array
    */
        public function storeStudent()
    {


        $student_number = Input::get('student-number');
        $department_id = Input::get('department');
        $teacher_id = Input::get('teacher');
        $student_name = Input::get('student-name');
    


        //Trying to get property of non-object yet...
        DB::table('student')->insert(
            ['student_number' => $student_number,
             'department_id' => $department_id,
             'teacher_id' => $teacher_id,
             'student_name' => $student_name,
             'student_email' => $student_number.'@oic.jp'
             ]
        );
        // view関数の第２引数に配列を渡す
        return view('student_registration');
    }

      /**
    * 返却
    *
    * URI : post /item_return
    * @author sho
    * @return array
    */

     public function Restore()
    {
        date_default_timezone_set('Asia/Tokyo');

        $returned_day = date("Y/m/d");


        $student_number = Input::get('student-number');
        $item_number = Input::get('loan-number');
        $data = [];

        $student = DB::table('student')->where('student_number', '=', $student_number)->first();

        DB::table('item')
        ->where('item_number', '=', $item_number)
        ->update(['loaned' => 0]);

        $item = DB::table('item')->where('item_number', '=', $item_number)->first();

         DB::table('rental')
            ->where('student_id', '=', $student->student_id)
            ->where('item_id', '=', $item->item_id)
            ->update(['return_date' => $returned_day,'completed' => 1]);

        $rental = DB::table('rental')->where('student_id', '=', $student->student_id)
            ->where('item_id', '=', $item->item_id)
            ->where('return_date','=',$returned_day)
            ->first();

        $data["student_number"] = $student->student_number;
        $data["item_name"] = $item->item_name;
        $data["plan_date"] = $rental->plan_date;
        $data["retun_date"] = $rental->return_date;

        return view('item_return', $data);
    } 
}
