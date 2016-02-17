@extends('layout')

@section('title')
生徒登録
@endsection

@section('content')
<div class="container" style="margin-top:100px; padding:20px 0;">
  <h1 class="text-center">生徒登録</h1>
  <form class="form-horizontal col-md-4 col-md-offset-4" action="student_registration" method="POST">

    <div class="form-group">
      <label class="control-label" for="student-number">学籍番号</label>
      <div >
        <input type="text" id="student-number" name="student-number" class="form-control">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label" for="student-name">氏名</label>
      <div >
        <input type="text" id="student-name" name="student-name" class="form-control">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label">学科</label>
      <select name="department" id="department-id" class="form-control">
        @foreach($departments as $department)
        <option value={{ $department->department_id}}>{{ $department->department_name}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
    <label class="control-label">担任教員名</label>
      <select name="teacher" id="teacher-id" class="form-control">
        @foreach($teachers as $teacher)
        <option value={{ $teacher->teacher_id}}>{{$teacher->teacher_name}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <div class="col-md-offset-4 col-md-4">
        <button type="submit" class="btn btn-primary btn-block">登録</button>
      </div>
    </div>

</form>
@endsection
