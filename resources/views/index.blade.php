@extends('layout')

@section('title')
  貸出システム
@endsection

@section('content')
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

  <div class="container" style="margin-top:100px; padding:20px 0;">
    <h1 class="text-center">登録フォーム</h1>
    <form class="form-horizontal col-md-4 col-md-offset-4" action="/registration" method="POST">
      <div class="form-group">
        <label class="control-label" for="student-number">学籍番号</label>
        <div >
          <input type="text" id="student-number" name="student-number" class="form-control"  autofocus>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label" for="loan-number">貸出番号</label>
        <div>
          <input type="text" id="loan-number" name="loan-number" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-4 col-md-4">
          <button type="submit" class="btn btn-primary btn-block">登録</button>
        </div>
      </div>
    </form>
  </div>
<script>
$('input[name=loan-number]').on('keydown', function(e) {
    if (e.keyCode == 9) {
        e.preventDefault();
        document.forms[0].submit()
    }
});
</script>
@endsection

