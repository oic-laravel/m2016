
<title>Laravel</title>

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
          <a class="navbar-brand" href="/student_registration_form">item list</a>
        </div>
      </div>
    </nav>
  </header>
  <div class="container">

    <!-- header -->
    <div id="header" >item list</div>

    <!-- main -->
    <div class="col-md-9">
      <!-- apply custom style -->
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>品名</th>
            <th>all stock</th>
            <th>can stock</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <ul class="rentals">
              @foreach($lendhistory as $row)
              <tr>
                <td>{{ $row->item_name}}</td>
                <td>{{ $row->student_number }}</td>
                <td>{{ $row->rental_date }}</td>
                <td>
                </td>
              </tr>
              @endforeach
            </ul>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
</body>
</html>