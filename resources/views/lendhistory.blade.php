@extends('layout')

@section('title')
  貸出履歴
@endsection

@section('content')
    <div class="container">
    <h2 class="text-center" style="margin-bottom: 30px;">貸出履歴一覧</h2>
      <table class="text-center table table-striped table-hover">
        <thead>
          <tr>
            <th class="text-center">品名</th>
            <th class="text-center">貸出品番号</th>
            <th class="text-center">学籍番号</th>
            <th class="text-center">貸出日付</th>
            <th class="text-center">返却日付</th>
            <th class="text-center">返却</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <ul class="rentals">
              @foreach($lendhistory as $row)
              <tr>
                <td>{{ $row->item_name}}</td>
                <td>{{ $row->item_number}}</td>
                <td>{{ $row->student_number }}</td>
                <td>{{ $row->rental_date }}</td>
                <td>{{ $row->plan_date }}</td>
                @if($row->return_date == '0000-00-00')
                <td>未返却</td>
                @else
                <td>{{ $row->return_date }}</td>
                @endif
                <td>
                <div style="display:inline-flex">
                  <form class="form-horizontal" action="/lendhistory/sendMail/{{$row->rental_id}}" method="POST">
                    <input type="submit" class="btn btn-primary btn-xs" value="メール送信" style="margin-right: 10px">
                  </form>
                  <form class="form-horizontal" method="post" action="/lendhistory/delete/{{$row->rental_id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" value="削除" class="btn btn-primary btn-xs">
                  </form>
                </div>
                </td>
              </tr>
              @endforeach
            </ul>
          </tr>
        </tbody>
      </table>
      {{-- ページネーションリンク --}}
      <div class="text-center">{!! $lendhistory->render() !!}</div>
    </div>
  </div>
@endsection
