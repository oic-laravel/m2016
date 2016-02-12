<!DOCTYPE html>
<html>
<head>
  <title>生徒登録</title>
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
            </div>
        </div>
    </nav>
  </header>
  <div class="container" style="margin-top:100px; padding:20px 0;">
    <h1 class="text-center">生徒登録</h1>
    <form class="form-horizontal col-md-4 col-md-offset-4" action="student_registration" method="POST">
      <div class="form-group">
        <label class="control-label">学籍番号</label>
        <div>
        <input type="text" name="student-number" size="10" value="" /><br />
        </div>
      </div>

          <div class="form-group">
        <label class="control-label">氏名</label>
        <div>
        <input type="text" name="student-name" size="15" value="" /><br />
        </div>
      </div>


      <div class="form-group">
        <label class="control-label">学科</label>

          <select name="department" id="department-id" class="form-control">
        @foreach($departments as $department)
            <option value={{ $department->department_id}}>{{ $department->department_name}}</option>
        @endforeach
          </select>
      </div>
      

      <div class="form-group">
        <label class="control-label">担任教員名</label>

          <select name="teacher" id="teacher-id" class="form-control">
          @foreach($teachers as $teacher)
            <option value={{ $teacher->teacher_id}}>{{$teacher->teacher_name}}</option>
            @endforeach
          </select>
          </div>
          

      

      <div class="form-group">
        <div class="col-md-offset-4 col-md-4">
          <button type="submit" class="btn btn-primary btn-block">登録</button>
        </div>
      </div>
  </div>
  </form>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
</body>
</html>
