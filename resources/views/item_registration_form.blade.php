@extends('layout')

@section('title')
貸出品登録
@endsection

@section('content')
  <div class="container" style="margin-top:100px; padding:20px 0;">
    <h1 class="text-center">貸出品の登録</h1>
    <form class="form-horizontal col-md-4 col-md-offset-4" action="/item_registration" method="POST">
      <div class="form-group">
        <label class="control-label">登録済みのアイテム</label>
        <div>
          <select name="item" id="exist-item" class="form-control">
            @foreach($itemName as $row)
            <option value={{ $row->item_name }}>{{ $row->item_name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-4 col-md-4">
          <button type="submit" class="btn btn-primary btn-block">登録</button>
        </div>
      </div>
    </form>

    <form class="form-horizontal col-md-4 col-md-offset-4" action="/item_registration" method="POST">
      <div class="form-group">
        <label class="control-label">新しいアイテム</label>
        <div>
          <input type="text" id="new-item" name="item" class="form-control" autofocus>
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
