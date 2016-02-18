@extends('layout')

@section('title')
貸出品一覧
@endsection

@section('content')
<div class="container">
  <div class="container">
    <h2 class="text-center" style="margin-bottom: 30px;">貸出品一覧</h2>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>貸出品名</th>
          <th>数量</th>
          <th>貸出可能個数</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <ul class="rentals">
            @foreach($itemList as $row)
            <tr>
              <td>{{ $row->item_name}}</td>
              <td>{{ $row->item_count }}</td>
              <td>{{ $row->loaned_count }}</td>
            </tr>
            @endforeach
          </ul>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
