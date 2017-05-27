<form class="form-horizontal" method="post">
    <div class="page-header"><h1>Авторизация</h1></div>
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
    <div class="form-group col-sm-offset-3 col-sm-9">
        <a href="authorization?action=registration">Зарегистрироваться</a>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-primary">Log in</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </div>
    </div>
</form>