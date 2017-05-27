<?php
    $fio = $group = $question1 = $question2 = $question3 = '';
    /*слово1 слово2 слово3 слово4 слово5 слово слово
    слово слово слово10 слово слово слово слово слово15
    слово слово слово слово слово20 слово слово слово
    слово слово25 слово слово слово слово слово30 слово31*/
    if(count($_POST) > 0){
        $fio = $_POST['FIO'];
        $group = $_POST['group'];
        $question1 = isset($_POST['question1'])? $_POST['question1']: '';
        $question2 = $_POST['question2'];
        $question3 = $_POST['question3'];

        $controller = new Test_controller();
        $errors = $controller->checkForm();
        if(count($errors) == 0){
            $controller->save();
            $fio = $group = $question1 = $question2 = $question3 = '';
        }
    }
    if(isset($_GET['testInfo']) && $_GET['testInfo'] == "show"){
        $controller = new Test_controller();
        $testInfo = $controller->getTestInfo();
    }
?>
<section class="container personal_information">
    <form class="form-horizontal" method="post">
        <div class="page-header"><h1>Тест</h1></div>
        <div class="form-group">
            <label for="FIO" class="col-sm-3">ФИО</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="FIO" name="FIO" value="<?=$fio?>" required>
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="fioWarning" class="alert alert-danger" style="display:
                <?php
                if(isset($errors['FIO']) && count($errors['FIO']) > 0){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                ;" role="alert">
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
            <label for="groups" class="col-sm-3">Группа</label>
            <div class="col-sm-9">
                <select id="groups" name="group" class="form-control" required>
                    <option value="" <?php if($group == '') echo "selected"?>>Не выбрано</option>
                    <optgroup label="1 курс">
                        <option value="11" <?php if(strcmp($group, "11") == 0) echo 'selected'?>>ИСб-11</option>
                        <option value="12" <?php if(strcmp($group, "12") == 0) echo 'selected'?>>ИСб-12</option>
                        <option value="13" <?php if(strcmp($group, "13") == 0) echo 'selected'?>>ИСб-13</option>
                        <option value="14" <?php if(strcmp($group, "14") == 0) echo 'selected'?>>ИСб-14</option>
                    </optgroup>
                    <optgroup label="2 курс">
                        <option value="21" <?php if(strcmp($group, "21") == 0) echo 'selected'?>>ИСб-21</option>
                        <option value="22" <?php if(strcmp($group, "22") == 0) echo 'selected'?>>ИСб-22</option>
                        <option value="23" <?php if(strcmp($group, "23") == 0) echo 'selected'?>>ИСб-23</option>
                        <option value="24" <?php if(strcmp($group, "24") == 0) echo 'selected'?>>ИСб-24</option>
                    </optgroup>
                    <optgroup label="3 курс">
                        <option value="31" <?php if(strcmp($group, "31") == 0) echo 'selected'?>>ИСб-31</option>
                        <option value="32" <?php if(strcmp($group, "32") == 0) echo 'selected'?>>ИСб-32</option>
                        <option value="33" <?php if(strcmp($group, "33") == 0) echo 'selected'?>>ИСб-33</option>
                        <option value="34" <?php if(strcmp($group, "34") == 0) echo 'selected'?>>ИСб-34</option>
                    </optgroup>
                    <optgroup label="4 курс">
                        <option value="41" <?php if(strcmp($group, "31") == 0) echo 'selected'?>>ИСб-41</option>
                        <option value="42" <?php if(strcmp($group, "32") == 0) echo 'selected'?>>ИСб-42</option>
                        <option value="43" <?php if(strcmp($group, "33") == 0) echo 'selected'?>>ИСб-43</option>
                        <option value="44" <?php if(strcmp($group, "34") == 0) echo 'selected'?>>ИСб-44</option>
                    </optgroup>
                </select>
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="fioWarning" class="alert alert-danger" style="display:
                <?php
                if(isset($errors['group']) && count($errors['group']) > 0){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                        ;" role="alert">
                    <?php
                    if(isset($errors['group'])){
                        foreach ($errors['group'] as $error){
                            echo "<p>$error</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="page-header"></div>
        <div class="form-group">
            <label  class="col-sm-3">Вопрос 1</label>
            <div class="col-sm-9">
                <label class="radio-inline">
                    <input type="radio" name="question1" value="option1" id="q1option1" <?php if(strcmp($question1, "option1") == 0)echo 'checked'?>>
                    вариант выбора 1
                </label>
                <label class="radio-inline">
                    <input type="radio" name="question1" value="option2" id="q1option2" <?php if(strcmp($question1, "option2") == 0)echo 'checked'?>>
                    вариант выбора 2
                </label>
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="fioWarning" class="alert alert-danger" style="display:
                <?php
                if(isset($errors['question1']) && count($errors['question1']) > 0){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                        ;" role="alert">
                    <?php
                    if(isset($errors['question1'])){
                        foreach ($errors['question1'] as $error){
                            echo "<p>$error</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="question2" class="col-sm-3">Вопрос 2</label>
            <div class="col-sm-9">
                <select id="question2" name="question2" class="form-control">
                    <option value="" <?php if($group == '') echo "selected"?>>Не выбрано</option>
                    <option value="0" <?php if(strcmp($question2, "0") == 0) echo 'selected'?>>case 1</option>
                    <option value="1" <?php if(strcmp($question2, "1") == 0) echo 'selected'?>>case 2</option>
                    <option value="2" <?php if(strcmp($question2, "2") == 0) echo 'selected'?>>case 3</option>
                    <option value="3" <?php if(strcmp($question2, "3") == 0) echo 'selected'?>>case 4</option>
                </select>
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="fioWarning" class="alert alert-danger" style="display:
                <?php
                if(isset($errors['question2']) && count($errors['question2']) > 0){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                        ;" role="alert">
                    <?php
                    if(isset($errors['question2'])){
                        foreach ($errors['question2'] as $error){
                            echo "<p>$error</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="question3" class="col-sm-3">Вопрос 3</label>
            <div class="col-sm-9">
                <textarea id="question3" name="question3" class="form-control" rows="3"><?=$question3?></textarea>
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="question3Warning" class="alert alert-danger" style="display:
                <?php
                if(isset($errors['question3']) && count($errors['question3']) > 0){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                ;" role="alert">
                    <?php
                    if(isset($errors['question3'])){
                        foreach ($errors['question3'] as $error){
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
    <div class="form-horizontal">
        <div class="page-header"></div>
        <div class="form-group">
            <div class=" col-sm-12">
                <?php
                $href = "#";
                if(array_key_exists('login', $_SESSION)) {
                    $href = "show";
                    if (isset($_GET['testInfo']) && $_GET['testInfo'] == "show") {
                        $href = "hide";
                    }
                }
                if($href != "#"){
                    echo "<a class='btn btn-default' href='test?testInfo=$href'>";
                    if($href == "show") echo "Показать результаты";
                    else echo "Скрыть результаты";
                    echo "</a>";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="form-horizontal">
        <?php
        if(isset($testInfo)){
            foreach ($testInfo as $record){
                echo "<div class='panel testInfo'>
                        <div class='panel-body' style='color: #2B4B4D;'>";

                echo "<div 'class=col-sm-3'>$record->date</div>";
                echo "<div 'class=col-sm-9'>$record->fio</div>";

                $answers = explode("%qsep%", $record->answers);
                foreach ($answers as $answer){
                    echo "<div>Ответ на вопрос: $answer</div>";
                }
                $correctness = ($record->correctness == 1)? "Тест пройден": "Тест не пройден";
                echo "<div class='col-sm-offset-3 col-sm-9'>$correctness</div>";

                echo "</div></div>";
            }
        }
        ?>
    </div>
</section>
