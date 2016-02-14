<!DOCTYPE HTML>
<html>
<head>
<title>貸出履歴</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">

</head>
<body>
  <header>
      <nav class="navbar navbar-inverse navbar-static-top navbar-fixed">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/index">貸出システム</a>
                <a class="navbar-brand" href="/lendhistory">貸出履歴</a>
                <a class="navbar-brand" href="/item_registration_form">貸出品登録</a>
                <a class="navbar-brand" href="/student_registration_form">生徒登録</a>
                <a class="navbar-brand" href="/item_list">貸出品一覧</a>
                <a class="navbar-brand" href="/item_return_form">返却</a>
                <a class="navbar-brand" href="/delete_item">貸出品削除</a>
                <a class="navbar-brand" href="/teacher_registration_form">教員登録</a>
                <a class="navbar-brand" href="/teacher_email_change">教員メールアドレス変更</a>
            </div>
        </div>
    </nav>
  </header>
  <div class="container">

    <!-- header -->
    <div id="header" >貸出履歴一覧</div>

    <!-- main -->
    <div class="container">
      <!-- apply custom style -->
      <table class="text-center table table-striped table-hover">
        <thead>
          <tr>
            <th class="text-center">品名</th>
            <th class="text-center">貸出品番号</th>
            <th class="text-center">学籍番号</th>
            <th class="text-center">貸出日付</th>
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
                <td>{{ $row->completed }}</td>
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
</body>
</html>
