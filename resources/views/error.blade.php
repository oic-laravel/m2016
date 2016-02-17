@extends('layout')

@section('title')
エラー
@endsection

@section('content')
  <div class="container" style="margin-top:100px; padding:20px 0;">
    <h1 class="text-center">error。</h1>
    {{ $error }}
  </div>
@endsection
