@extends('layout')

@section('title')
変更完了
@endsection

@section('content')
  <div class="container" style="margin-top:100px; padding:20px 0;">
    <h1 class="text-center">メールアドレスの変更が完了しました。</h1>
    <h2 class="text-center">変更があった場合は随時変更してください。</h2>
    <h3 class="text-center">教員名:<?= $teacher_name ?><br>変更後メールアドレス:<?= $teacher_email ?></h>


  </div>
@endsection