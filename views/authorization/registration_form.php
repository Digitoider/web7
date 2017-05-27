<form class="form-horizontal" method="post">
    <div class="page-header"><h1>Регистрация</h1></div>
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
        <label for="password" class="col-sm-3">Password</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="password" name="password" value="<?=$password?>">
        </div>
        <div class=" col-sm-offset-3 col-sm-9">
            <div id="fioWarning" class="alert alert-danger" style="display:
            <?php
            if(isset($errors['password']) && count($errors['password']) > 0){
                echo "block";
            } else {
                echo "none";
            }
            ?>
                ;" role="alert">
                <?php
                if(isset($errors['password'])){
                    foreach ($errors['password'] as $error){
                        echo "<p>$error</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-primary">Sign up</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </div>
    </div>
</form>