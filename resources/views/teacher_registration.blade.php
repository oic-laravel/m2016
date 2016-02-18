@extends('layout')

@section('title')
教員登録完了
@endsection

@section('content')
  <div class="container" style="margin-top:100px; padding:20px 0;">
    <h1 class="text-center">教員登録が完了しました。</h1>
    <h2 class="text-center">メールアドレスの変更があった場合はすぐに更新してください。</h2>
    <h3 class="text-center">教員名:<?= $teacher_name ?><br>教員メールアドレス:<?= $teacher_email ?></h3>
  </div>
@endsection