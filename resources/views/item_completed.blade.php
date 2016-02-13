<!DOCTYPE html>
<html>
<head>
  <title>貸出システム</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
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
            </div>
        </div>
    </nav>
  </header>
  <div class="container" style="margin-top:100px; padding:20px 0;">
    <h1 class="text-center">completed item registration</h1>
    @foreach($item as $row)
    item_number : {{ $row->item_number }}<br>
    item_name   : {{ $row->item_name }}
    @endforeach
  </div>
  <div>
    <form class="form-horizontal col-md-4 col-md-offset-4" action="#" method="POST">
      <div class="form-group">
        <label class="control-label" for="loan-number">バーコード生成</label>
        <div>
        @foreach($item as $row)
          <input type="text" id="barcode-value" name="barcode-value" value={{ $row->item_number }} class="form-control">
        @endforeach
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-4 col-md-4">
          <button type="submit" class="btn btn-primary btn-block">登録</button>
        </div>
      </div>
    </form>
  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
</body>
</html>
