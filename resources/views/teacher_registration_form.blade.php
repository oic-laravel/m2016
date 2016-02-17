@extends('layout')

@section('title')
  教員登録
@endsection

@section('content')
  <div class="container" style="margin-top:100px; padding:20px 0;">
    <h1 class="text-center">教員登録</h1>
    <form class="form-horizontal col-md-4 col-md-offset-4" action="teacher_registration" method="POST">
      <div class="form-group">
        <label class="control-label">教員名</label>
        <div>
        <input type="text" name="teacher-name" class="form-control">
        </div>
      </div>

          <div class="form-group">
        <label class="control-label">教員メールアドレス</label>
        <div>
        <input type="text" name="teacher-email" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-4 col-md-4">
          <button type="submit" class="btn btn-primary btn-block">登録</button>
        </div>
      </div>
  </form>
  </div>
@endsection
