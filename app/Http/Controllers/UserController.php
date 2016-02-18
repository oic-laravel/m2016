<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

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
        $result = DB::table('rental')->where('rental_id', $id)->delete();
        if(!$result){
                $error = "errorが発生しました"; 
                return view('error')->with('error',$error);
        }
        return redirect()->to('/lendhistory');
    }

    /**
    * send mail
    *
    * URI : POST /lendhistory/delete/{id}
    * @param array $id
    * @author hide
    * @return App\Http\Controllers\UserController@showHistory
    */
    public function sendMail($id)
    {
        $data = DB::table('rental')
        ->join('student','rental.student_id','=','student.student_id')
        ->join('item','rental.item_id','=','item.item_id')
        ->select('rental.rental_id','rental.student_id','student.student_name','student.student_email','rental.item_id','item.item_name')
        ->where('rental.rental_id', '=', $id)->first();
        if(!$data){
                $error = "errorが発生しました"; 
                return view('error')->with('error',$error);
        }
        $student_email = $data->student_email;
        $student_name = $data->student_name;
        $subject = 'oicrentalの貸し出し品について';
        $from_mail = 'oicrental@gmail.com';
        $from_name = 'oicrental';

        Mail::send('emails.text', array('email' => $data), function($message) use($student_email, $student_name,$subject,$from_mail,$from_name){

        $message->to($student_email,$student_name)
                ->from($from_mail, $from_name)
                ->subject($subject);
        });

        
        return view('send_mail_completed')->with('student_name',$student_name);
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
        if(!$student_number){
            $error = "学籍番号の入力がありません";
            return view('error')->with('error',$error);
        }

		$item_number = Input::get('loan-number');
        if(!$item_number){
            $error = "貸出番号の入力がありません";
            return view('error')->with('error',$error);
        }

        $result=DB::table('item')
        ->where('item_number','=',$item_number)
        ->where('loaned','=',1)
        ->first();
        if($result){//error! item was loaned.
            $error = "すでに借りられています"; 
            return view('error')->with('error',$error);
        }

		$data = [];

 		$student = DB::table('student')->where('student_number', '=', $student_number)->first();
        if(!$student){
            $error = "学籍番号が見つかりません"; 
            return view('error')->with('error',$error);
        }

 		$item = DB::table('item')->where('item_number', '=', $item_number)->first();
        if(!$item){
            $error = "貸出番号が見つかりません"; 
            return view('error')->with('error',$error);
        }

 		$data["student_number"] = $student->student_number;
 		$data["item_name"] = $item->item_name;
 		//Trying to get property of non-object yet...
 		$result = DB::table('rental')->insert(
    		['student_id' => $student->student_id,
    		 'item_id' => $item->item_id,
    		 'rental_date' => $today,
    		 'plan_date' => $return_plan_day,
    		 'completed' => 0
    		 ]
		);
        if(!$result){
                $error = "errorが発生しました"; 
                return view('error')->with('error',$error);
        }

        $result = DB::table('item')
        ->where('item_number','=',$item_number)
        ->update(['loaned' => 1]);
        if(!$result){
                $error = "errorが発生しました"; 
                return view('error')->with('error',$error);
        }

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
        $data['itemList'] = DB::select('select DISTINCT base.item_name ,item_count,ifnull(loaned_count,0) as loaned_count
                        from item base
                        left OUTER join (select item1.item_name,count(item1.item_name) as item_count
                                        from item item1
                                        group by item1.item_name
                            ) as item_count
                            on base.item_name = item_count.item_name
                        left OUTER join (select item2.item_name,count(item2.loaned) as loaned_count
                                        from item item2
                                        where loaned = 0
                                        group by item2.item_name
                            ) as item_loaned
                        on base.item_name = item_loaned.item_name');

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
        $result = DB::table('item')->insert(
            ['item_name' => Input::get('item'),
             'remarks' => "test"//入力した値を受け取るー未実装
             ]);

        $id = DB::getPdo()->lastInsertId();

        DB::table('item')
        ->where('item_id', $id)
        ->update(['item_number' => Input::get('item').'-'.$id]);
        
        $data['item']=DB::table('item')
        ->select('item_number','item_name')
        ->where('item_id', $id)
        ->get();

        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        $barcode = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode(Input::get('item').'-'.$id, $generator::TYPE_CODE_128)) . '">';

        return view('/item_completed',$data)->with('barcode',$barcode);
    }

    /**
    * show barcode
    * これ使ってる？
    * URI : GET /?
    * @author hide
    * @return array
    */
    public function showBarcode()
    {
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        return '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode(Input::get('barcode-value'), $generator::TYPE_CODE_128)) . '">';
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
        ->select('rental.rental_id', 'item.item_name', 'student.student_number','rental.return_date','rental_date','item.item_number', 'rental.plan_date')
        ->orderBy('rental.plan_date', 'asc')
        ->paginate(10);

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
        if(!$student_number){
            $error = "学籍番号の入力がありません"; 
            return view('error')->with('error',$error);
        }
        $department_id = Input::get('department');
        if(!$department_id){
            $error = "学科の入力がありません"; 
            return view('error')->with('error',$error);
        }
        $teacher_id = Input::get('teacher');
        if(!$teacher_id){
            $error = "担任教師の入力がありません"; 
            return view('error')->with('error',$error);
        }
        $student_name = Input::get('student-name');
        if(!$student_name){
            $error = "生徒名の入力がありません"; 
            return view('error')->with('error',$error);
        }
    

        DB::table('student')->insert(
            ['student_number' => $student_number,
             'department_id' => $department_id,
             'teacher_id' => $teacher_id,
             'student_name' => $student_name,
             'student_email' => $student_number.'@oic.jp'
             ]
        );
        // view関数の第２引数に配列を渡す
        return view('student_registration')->with('student_number',$student_number)->with('student_name',$student_name);
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
        if(!$student_number){
            $error = "貸出番号の入力がありません"; 
            return view('error')->with('error',$error);
        }
        $data = [];
        if(!$student_number){
            DB::table('item')
            ->where('item_number', '=', $item_number)
            ->update(['loaned' => 0]);

            $item = DB::table('item')->where('item_number', '=', $item_number)->first();
            
            if(!$item){
                $error = "貸出番号が見つかりません"; 
                return view('error')->with('error',$error);
            }

            DB::table('rental')
            ->where('item_id', '=', $item->item_id)
            ->update(['return_date' => $returned_day,'completed' => 1]);

            $data["student_number"] = "";
            $data["item_name"] = $item_number;
            $data["plan_date"] = "";
            $data["retun_date"] = "";
            
            return view('item_return', $data);;
        }
        $data = [];

        $student = DB::table('student')->where('student_number', '=', $student_number)->first();

        if(!$student){
                $error = "学籍番号が見つかりません"; 
                return view('error')->with('error',$error);
        }

        DB::table('item')
        ->where('item_number', '=', $item_number)
        ->update(['loaned' => 0]);

        $item = DB::table('item')->where('item_number', '=', $item_number)->first();

        if(!$item){
                $error = "貸出番号が見つかりません"; 
                return view('error')->with('error',$error);
        }

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

        /**
    * insert item name to pullbox
    *
    * URI : GET /delete_complete
    * @author hisashi
    * @return array
    */
    public function showItemDelete()
    {
        $item_number = Input::get('item-number');

        if(!$item_number){
                $error = "貸出番号の入力がありません"; 
                return view('error')->with('error',$error);
        }

        $item_result = DB::table('item')
        ->where('item_number', $item_number)
        ->select('item_id')
        ->get();
        if(!$item_result){
                $error = "貸出番号が見つかりません"; 
                return view('error')->with('error',$error);
        }

        foreach ($item_result as $id) {
            $item_id = $id->item_id;
        }
        $result1 = DB::table('rental')
        ->where('item_id','=', $item_id)
        ->where('completed','=',1)
        ->delete();

        $result2 = DB::table('item')
        ->where('item_number', $item_number)
        ->where('loaned','=',0)
        ->delete();
        if($result1 == 0 && $result2 == 0){
            $error = "errorが発生しました"; 
                return view('error')->with('error',$error);
        }
        return view('/delete_complete')->with('item_number',$item_number);
    }

        /**
    * insert item name to pullbox
    *
    * URI : GET /teacher_registration
    * @author hisashi
    * @return void
    */
    public function storeTeacher()
    {


        $teacher_name = Input::get('teacher-name');
        if(!$teacher_name){
                $error = "担任教師の入力がありません"; 
                return view('error')->with('error',$error);
        }
        $teacher_email = Input::get('teacher-email');
        if(!$teacher_email){
                $error = "担任教師のメールアドレスの入力がありません"; 
                return view('error')->with('error',$error);
        }


        $result = DB::table('teacher')->insert(
            ['teacher_name' => $teacher_name,
             'teacher_email' => $teacher_email,
             ]
        );

        if(!$result){
                $error = "すでに登録されています"; 
                return view('error')->with('error',$error);
        }
        // view関数の第２引数に配列を渡す
        return view('teacher_registration')->with('teacher_name',$teacher_name)->with('teacher_email',$teacher_email);
    }


        /**
    * insert item name to pullbox
    *
    * URI : GET /email_change
    * @author hisashi
    * @return void
    */
    public function storeChangeEmail()
    {
        $teacher_name = Input::get('teacher-name');
        if(!$teacher_name){
                $error = "担任教師の入力がありません"; 
                return view('error')->with('error',$error);
        }
        $teacher_email = Input::get('teacher-email');
        if(!$teacher_email){
                $error = "担任教師のメールアドレスの入力がありません"; 
                return view('error')->with('error',$error);
        }


        $result = DB::table('teacher')
            ->where('teacher_name', '=', $teacher_name)
            ->update(['teacher_email' => $teacher_email
                ]);
        if(!$result){
                $error = "errorが発生しました"; 
                return view('error')->with('error',$error);
        }

        return view('email_change_complete')->with('teacher_name',$teacher_name)->with('teacher_email',$teacher_email);
    }
}
