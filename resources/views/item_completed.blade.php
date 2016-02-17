@extends('layout')

@section('title')
  登録完了
@endsection

@section('content')
  <div class="container" style="margin-top:100px; padding:20px 0;">
    <h1 class="text-center">貸出品登録が完了しました</h1>
    <div class="col-md-6 col-md-offset-3" style="margin-top:50px">
    @foreach($item as $row)
    貸出品番号 : {{ $row->item_number }}<br>
    貸出品名   : {{ $row->item_name }}
    @endforeach
    <br>
    <br>
    このページをプリントアウトしてバーコードを貸出品に貼り付けてください。<br>
    紙は厳重に保管してください。
    </div>
    <div class="col-md-4 col-md-offset-4" style="margin-top:100px; padding-top: 10px; border-style: dashed none dashed none;">

    <p class="text-center"><?= $barcode ?></p>
    <p class="text-center">{{ $row->item_number}}</p>

    </div>
  </div>
@endsection