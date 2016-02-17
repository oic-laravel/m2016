@extends('layout')

@section('title')
貸出完了
@endsection

@section('content')
  <div class="container" style="margin-top:100px; padding:20px 0;">
    <h1 class="text-center">貸出処理が完了しました。</h1>
    学籍番号 <?= $student_number ?>.<br>
    貸出品 <?= $item_name ?>. 
  </div>
@endsection