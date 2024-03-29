
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<title>Narrow Jumbotron Template for Bootstrap</title>

<!-- Bootstrap core CSS -->
<link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="/assets/css/jumbotron-narrow.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="/assets/js/ie-emulation-modes-warning.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/assets/js/ie10-viewport-bug-workaround.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

<div class="container">
<div class="header">
<ul class="nav nav-pills pull-right">
<li class="active"><a href="#">Главная</a></li>
<li><a href="/?r=add">Добавить</a></li>
<li><a href="#">About</a></li>
<li><a href="#">Contact</a></li>
</ul>
<h3 class="text-muted">Project name</h3>
</div>

<div>
            <table class="table">
<thead>
<tr>
<th>#</th>
<th>Название</th>
<th>Выполнено</th>
<th>Создано</th>
<th>Действие</th>
</tr>
</thead>
<tbody>
          <?php while ($row = $query->fetch()): ?>

<tr>
<td><?php echo $row->id; ?></td>
<td><?php echo $row->title;?></td>
<td><?php echo $row->resolved;?></td>
<td><?php echo $row->createdAt;?></td>
  <td>
        <a href="/?r=delete&id=<?php echo $row->id;?>">Удалить<a/>
        <a href="/?r=show&id=<?php echo $row->id;?>">Посмотреть<a/>
        <a href="/?r=update&id=<?php echo $row->id;?>">Изменить<a/>
  </td>
</tr>
<?php endwhile;?>

</tbody>
                    </table>
</div>

<div class="row marketing">
<div class="col-lg-6">&nbsp;</div>
<div class="col-lg-6">&nbsp;</div>
</div

<div class="footer">
<p>&copy; Company 2014</p>
</div>

</div> <!-- /container -->
</body>
</html>