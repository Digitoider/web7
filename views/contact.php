<?php
    $fio = $birthDate = $age = $sex = $telephone = $email = '';

    if(count($_POST)>0){
        $fio = $_POST['FIO'];
        $birthDate = $_POST['birthDate'];
        $sex = isset($_POST['optionsRadios'])? $_POST['optionsRadios']:'';
        $age = $_POST['age'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];


        //echo '<p style="margin-top: 50px;">Errors:</p>';
        $controller = new Contact_controller();
        $errors = $controller->checkForm();
        /*foreach ($errors as $error){
            echo '<p>' . $error . '</p>';
        }*/
    }
?>
<script src="public/js/calendar.js"></script>
<section class="container personal_information">
    <form class="form-horizontal" method="post">
        <div class="page-header"><h1>Контакт</h1></div>
        <div class="form-group">
            <label for="FIO" class="col-sm-3">ФИО</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="FIO" name="FIO" required value="<?=$fio?>">
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="fioWarning" class="alert alert-danger" style="display:
                <?php if(isset($errors['FIO']) && count($errors['FIO']) > 0){
                    echo "block";
                } else {
                    echo "none";
                }?> ;" role="alert">
                    <?php
                        if(isset($errors['FIO'])){
                            foreach ($errors['FIO'] as $error){
                                echo "<p>$error</p>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="birthDate" class="col-sm-3">Дата рождения</label>
            <div class="col-sm-9">
                <!-- <button id="calendarBtn" class="btn btn-default col-sm-12" onclick="showCalendar(event)">Показать календарь <span class="caret"></span></button> -->
                <input type="text" class="form-control" id="birthDate" name="birthDate" value="<?=$birthDate?>" onclick="showCalendar(event)" >
            </div>
            <div id="calendarContainer" class=" col-sm-offset-3 col-sm-9">

            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-3">Выберите пол</label>
            <div class="col-sm-9">
                <label class="radio-inline">
                    <input type="radio" name="optionsRadios" id="maleRadio" value="male" <?php if(strcmp($sex, "male")==0)echo "checked"?>>
                    муж
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optionsRadios" id="femaleRadio" value="female" <?php if(strcmp($sex, "female")==0)echo "checked"?>>
                    жен
                </label>
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="sexWarning" class="alert alert-danger" style="display:
                 <?php
                 if(isset($errors['sex']) && count($errors['sex']) > 0){
                     echo "block";
                 } else {
                     echo "none";
                 }
                 ?>;" role="alert">
                    <?php
                    if(isset($errors['sex'])){
                        foreach ($errors['sex'] as $error){
                            echo "<p>$error</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="age" class="col-sm-3">Возраст</label>
            <div class="col-sm-9">
                <select id="age" name="age" class="form-control">
                    <option value="0" <?php if(strcmp($age, "0") == 0) echo "selected";?>>меньше 15</option>
                    <option value="1" <?php if(strcmp($age, "1") == 0) echo "selected";?>>от 16 до 20</option>
                    <option value="2" <?php if(strcmp($age, "2") == 0) echo "selected";?>>от 21 до 30</option>
                    <option value="3" <?php if(strcmp($age, "3") == 0) echo "selected";?>>больше 30</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="telephone" class="col-sm-3">Телефон</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="telephone" name="telephone" value="<?=$telephone?>">
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="telephoneWarning" class="alert alert-danger" style="display:
                 <?php
                 if(isset($errors['telephone']) && count($errors['telephone']) > 0){
                     echo "block";
                 } else {
                     echo "none";
                 }
                 ?>
                 ;" role="alert">
                    <?php
                    if(isset($errors['telephone'])){
                        foreach ($errors['telephone'] as $error){
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
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-primary"> <!--data-toggle="modal" data-target="#mymodal"-->Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>
        </div>
    </form>

    <div class="modal fade bs-example-modal-sm" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header row">
                    <h4 class="modal-title">Внимание </h4>
                </div>
                <div class="modal-body">
                    <p>Вы действительно хотите отправить форму?</p>
                </div>
                <div class="modal-footer row">
                    <button class="btn btn-default col-sm-offset-6 col-sm-2" data-dismiss="modal">Нет</button>
                    <button class="btn btn-success col-sm-2" data-dismiss="modal">Да</button>
                </div>
            </div>
        </div>
    </div>
</section>