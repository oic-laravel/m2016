<!DOCTYPE html>
<html>
<head>
  <title>貸し出しシステム</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
</head>
<body>
  <header>
      <nav class="navbar navbar-inverse navbar-static-top navbar-fixed">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/welcome">貸し出しシステム</a>
                <a class="navbar-brand" href="/gridview">在庫管理画面</a>
            </div>
        </div>
    </nav>
  </header>
  <div class="container" style="margin-top:100px; padding:20px 0;">
    <h1 class="text-center">rental registration</h1>
    Hello!! <?= $student_name ?>.<br>
    You rented <?= $item_name ?>. 
  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
</body>
</html>
