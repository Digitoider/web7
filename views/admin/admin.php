<?php
$registry = Registry::getInstance();
if($_SESSION['login'] != $registry['adminLogin'] || $_SESSION['password'] != $registry['adminPassword']){
    header("Location: main");
    exit;
}
$action = "noaction";
if(isset($_GET['action'])){
    $action = $_GET['action'];
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/common.css" rel="stylesheet">
    <link href="public/css/adminFrames.css" rel="stylesheet">
</head>
<body>
    <div class="frames">
        <div class="container-fluid">
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <a href="main">На главную</a>
                </li>
                <li role="presentation">
                    <a href="admin?action=blogEdit" <?php if($action == "blogEdit")echo " class='btn-primary'"?>>Редактор блога</a>
                </li>
                <li role="presentation">
                    <a href="admin?action=loadmessages" <?php if($action == "loadmessages")echo " class='btn-primary'"?>>Загрузка сообщений</a>
                </li>
                <li role="presentation">
                    <a href="admin?action=showVisitors" <?php if($action == "showVisitors")echo " class='btn-primary'"?>>Статистика посещений</a>
                </li>
            </ul>
        </div>
        <div>
            <?php include_once 'content.php'?>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="public/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/js/bootstrap.min.js"></script>

</body>
</html>