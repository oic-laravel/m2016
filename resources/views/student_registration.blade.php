@extends('layout')

@section('title')
生徒登録完了
@endsection

@section('content')
  <div class="container" style="margin-top:100px; padding:20px 0;">
    <h1 class="text-center">生徒登録が完了しました。</h1>
    <h2 class="text-center">登録は初回のみです。</h2>
     <h3 class="text-center">学籍番号:<?= $student_number ?><br>生徒氏名:<?= $student_name ?></h>

  </div>
@endsection
