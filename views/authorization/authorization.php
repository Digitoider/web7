<?php
$registry = Registry::getInstance();
$surname = $name = $middleName = $email = $password = '';

$controller = new Authorization_controller();

if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    $controller->removeUserFrom_SESSION();
    header("Location: authorization");
}
else if(count($_POST)>0){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //echo '<p style="margin-top: 50px;">Errors:</p>';
    if(isset($_GET['action']) && $_GET['action'] == "registration"){
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $middleName = $_POST['middleName'];
        $errors = $controller->validateRegistrationForm($surname, $name, $middleName, $email, $password);
        if(count($errors) == 0){
            $user = $controller->checkUser($email);
            /*var_dump($registry['adminLogin']);
            var_dump($user);*/
            if(array_key_exists('notfound', $user) && $email != $registry['adminLogin']){
                $controller->signInUser($name, $surname, $middleName, $email, $password);
                $surname = $name = $middleName = $email = $password = '';
                $success = "Регистрация прошла успешно";
            }else{
                $errors['common'][] = "Пользователь с таким логином уже существует";
            }
        }
    }else{//authorization
        $user = $controller->checkUser($email, $password);
        //var_dump($user);
        //$registry['user'] = $user;
        if(!array_key_exists('notfound', $user)){
            $controller->saveUserTo_SESSION($user);
            //var_dump($_SESSION);
            header("Location: main");
            exit;
        }
        else if($email == $registry['adminLogin'] && $password == $registry['adminPassword']){
            $controller->saveAdminTo_SESSION();
            header("Location: admin");
            exit;
        }
        else{
            $errors['common'][] = "Неверный логин или пароль";
        }
    }
}
?>
<section class="container personal_information">

    <?php
        if(isset($_GET['action']) && $_GET['action'] == "registration"){
            include_once 'registration_form.php';
        }else{
            include_once 'login_form.php';
        }
    ?>
    <div class="form-group">
        <div class=" col-sm-offset-3 col-sm-9">
            <div id="fioWarning" class="alert alert-danger" style="display:
            <?php
            if(isset($errors['common']) && count($errors['common']) > 0){
                echo "block";
            } else {
                echo "none";
            }
            ?>
                    ;" role="alert">
                <?php
                if(isset($errors['common'])){
                    foreach ($errors['common'] as $error){
                        echo "<p>$error</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class=" col-sm-offset-3 col-sm-9">
            <div id="fioWarning" class="alert alert-success" style="display:
            <?php
            if(isset($success)){
                echo "block";
            } else {
                echo "none";
            }
            ?>
                    ;" role="alert">
                <?php
                if(isset($success)){
                    echo "<p>$success</p>";
                }
                ?>
            </div>
        </div>
    </div>
</section>