@extends('layout')

@section('title')
貸出品削除
@endsection

@section('content')
  <div class="container" style="margin-top:100px; padding:20px 0;">
        <form class="col-md-4 col-md-offset-4" action="delete_complete" method="POST">

      <div class="form-group">
        <h1 class="text-center">貸出品削除</h1>
        <div >
          <label class="control-label" >貸出品番号</label>
          <input type="text" id="number" name="item-number" class="form-control">
        </div>
      </div>
            <div class="form-group">
        <div class="col-md-offset-4 col-md-4">
          <button type="submit" class="btn btn-primary btn-block">削除</button>
        </div>
      </div>
  </div>
    </div>
  </div>
  </form>
@endsection