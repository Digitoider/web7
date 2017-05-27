<?php
    ob_start();

    $registry = Registry::getInstance();
    /*var_dump($registry);
    var_dump($_SESSION);*/

    $visitorsController = new Visitors_controller();
    $visitorsController->saveVisitor();

    if(array_key_exists('fio', $_SESSION)){
        $sessionFIO = $_SESSION['fio'];
    }
    /*if(isset($_POST['login']) && isset($_POST['password'])){
        $lgn = $_POST['login'];
        $pwd = $_POST['password'];
        if($lgn == $registry['adminLogin'] && $pwd == $registry['adminPassword']){
            $_SESSION['login'] = $lgn;
            $_SESSION['password'] = $pwd;
            header("Location: admin/admin");
            exit;
        }else{
            $fio = $_SESSION['fio'];
        }
    }*/
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Alexander</title>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/css/common.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="../../index.php" id="date"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
              <?php
              $dropdown = '<ul class="dropdown-menu">
                                <li><a href="myinterests#hobbyAnchor">Хобби</a></li>
                                <li><a href="myinterests#booksAnchor">Книги</a></li>
                                <li><a href="myinterests#musicAnchor">Музыка</a></li>
                                <li><a href="myinterests#movieAnchor">Фильмы</a></li>
                           </ul>';
              $active_li['main'] = '<li class="active"><a href="#">Главная<span class="sr-only">(current)</span></a></li>';
              $active_li['aboutme'] = '<li class="active"><a href="#">Обо мне <span class="sr-only">(current)</span></a></li>';
              $active_li['myinterests'] = '<li class="dropdown" id="myInterests">
          		                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Мои интересы <span class="caret"></span></a>
          		                    ' . $dropdown . '
			                    </li>';
              $active_li['learning'] = '<li class="active"><a href="#">Учеба <span class="sr-only">(current)</span></a></li>';
              $active_li['photoalbum'] = '<li class="active"><a href="#">Фотоальбом <span class="sr-only">(current)</span></a></li>';
              $active_li['contact'] = '<li class="active"><a href="#">Контакт <span class="sr-only">(current)</span></a></li>';
              $active_li['test'] = '<li class="active"><a href="#">Тест <span class="sr-only">(current)</span></a></li>';
              $active_li['guestbook'] = '<li class="active"><a href="#">Гостевая книга <span class="sr-only">(current)</span></a></li>';
              $active_li['blog'] = '<li class="active"><a href="#">Блог <span class="sr-only">(current)</span></a></li>';
              //$active_li['history'] = '<li><a class=active" href="#">История <span class="sr-only">(current)</span></a></li>';

              $inactive_li['main'] = '<li><a href="main">Главная</a></li>';
              $inactive_li['aboutme'] = '<li><a href="aboutme">Обо мне </a></li>';
              $inactive_li['myinterests'] = '<li class="dropdown" id="myInterests">
          		                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Мои интересы <span class="caret"></span></a>
			                        ' . $dropdown . '
			                    </li>';
              $inactive_li['learning'] = '<li><a href="learning">Учеба</a></li>';
              $inactive_li['photoalbum'] = '<li><a href="photoalbum">Фотоальбом</a></li>';
              $inactive_li['contact'] = '<li><a href="contact">Контакт</a></li>';
              $inactive_li['test'] = '<li><a href="test">Тест</a></li>';
              $inactive_li['guestbook'] = '<li><a href="guestbook">Гостевая книга</a></li>';
              $inactive_li['blog'] = '<li><a href="blog">Блог </a></li>';
              //$inactive_li['history'] = '<li><a href="history">История</a></li>';
              $page = isset($_GET['url'])?$_GET['url']:'main';
              foreach($active_li as $key => $value){
                  if(strcmp($page, $key) == 0){
                      echo $active_li[$key];
                  }
                  else{
                      echo $inactive_li[$key];
                  }
              }
              ?>
	      </ul>
          <ul class="nav navbar-nav navbar-right">
              <?php
                  if(isset($sessionFIO)){
                      $href = '';
                      $registry = Registry::getInstance();
                      if($_SESSION['login'] == $registry['adminLogin'] && $_SESSION['password'] == $registry['adminPassword']){
                          $href = "href='admin'";
                      }
                      echo "<li><a $href>$sessionFIO</a></li>";
                  }
              ?>
              <?php
                  $optionText = "Авторизоваться";
                  $href = "href='authorization'";
                  if(isset($sessionFIO)){
                      $optionText = "Выйти";
                      $href = "href='authorization?action=logout'";
                  }
              ?>
              <li>
                  <a <?=$href?>><?=$optionText?></a>
              </li>
          </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>