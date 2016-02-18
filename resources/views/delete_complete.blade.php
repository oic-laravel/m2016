@extends('layout')

@section('title')
削除完了
@endsection

@section('content')
<div class="container">
  <p>削除完了</p>

  <div class="col-md-9">
    <div class="container" style="margin-top:100px; padding:20px 0;">
      <h1 class="text-center">貸出品削除が完了しました。</h1>
      <h2 class="text-center">バーコードは破棄してください。</h2>
      <h3 class="text-center">貸出品番号<br><?= $item_number ?></h3>
    </div>
  </div>
</div>
@endsection