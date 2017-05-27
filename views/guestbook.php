<?php
    $surname = $name = $middleName = $email = $content = '';

    if(count($_POST)>0){
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $middleName = $_POST['middleName'];
        $email = $_POST['email'];
        $content = $_POST['content'];


        //echo '<p style="margin-top: 50px;">Errors:</p>';
        $controller = new GuestBook_controller();
        $errors = $controller->checkForm();
        /*foreach ($errors as $error){
            echo '<p>' . $error . '</p>';
        }*/
    }
?>
<section class="container personal_information">
    <form class="form-horizontal" method="post">
        <div class="page-header"><h1>Гостевая книга</h1></div>
        <div class="form-group">
            <label for="surname" class="col-sm-3">Фамилия</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="surname" name="surname" value="<?=$surname?>" required>
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="fioWarning" class="alert alert-danger" style="display:
                <?php
                if(isset($errors['surname']) && count($errors['surname']) > 0){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                    ;" role="alert">
                    <?php
                    if(isset($errors['surname'])){
                        foreach ($errors['surname'] as $error){
                            echo "<p>$error</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-3">Имя</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" value="<?=$name?>" required>
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="fioWarning" class="alert alert-danger" style="display:
                <?php
                if(isset($errors['name']) && count($errors['name']) > 0){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                    ;" role="alert">
                    <?php
                    if(isset($errors['name'])){
                        foreach ($errors['name'] as $error){
                            echo "<p>$error</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="middleName" class="col-sm-3">Отчество</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="middleName" name="middleName" value="<?=$middleName?>" required>
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="fioWarning" class="alert alert-danger" style="display:
                <?php
                if(isset($errors['middleName']) && count($errors['middleName']) > 0){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                    ;" role="alert">
                    <?php
                    if(isset($errors['middleName'])){
                        foreach ($errors['middleName'] as $error){
                            echo "<p>$error</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3">Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" id="email" name="email" value="<?=$email?>">
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="fioWarning" class="alert alert-danger" style="display:
                <?php
                if(isset($errors['email']) && count($errors['email']) > 0){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                        ;" role="alert">
                    <?php
                    if(isset($errors['email'])){
                        foreach ($errors['email'] as $error){
                            echo "<p>$error</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-sm-3">Текст отзыва</label>
            <div class="col-sm-9">
                <textarea id="content" name="content" class="form-control" rows="3"><?=$content?></textarea>
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="question3Warning" class="alert alert-danger" style="display:
                <?php
                if(isset($errors['content']) && count($errors['content']) > 0){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                    ;" role="alert">
                    <?php
                    if(isset($errors['content'])){
                        foreach ($errors['content'] as $error){
                            echo "<p>$error</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>
        </div>
    </form>
</section>