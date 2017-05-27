<?php
$subject = $content = '';
if(count($_POST) > 0){
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    require_once 'controllers/admin/blogEdit_controller.php';
    $controller = new blogEdit_controller();
    $errors = $controller->checkForm();
    if(count($errors) == 0){

        if($controller->save()){
            $success = "Собщение сохранено";
            $subject = $content = '';
        }
        else{
            $errors['image'] = "Произошла ошибка при сохранении изображения";
        }
    }else{
        //var_dump($errors);
    }
}
?>
<section class="container ">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="page-header"><h1>Добавление сообщения </h1></div>
        <div class="form-group">
            <label for="subject" class="col-sm-3">Тема</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="subject" name="subject" value="<?=$subject?>" required>
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="fioWarning" class="alert alert-danger" style="display:
                <?php
                if(isset($errors['subject']) && count($errors['subject']) > 0){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                    ;" role="alert">
                    <?php
                    if(isset($errors['subject'])){
                        foreach ($errors['subject'] as $error){
                            echo "<p>$error</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="content" class="col-sm-3">Сообщение </label>
            <div class="col-sm-9">
                <textarea id="content" name="content" class="form-control" rows="4" required><?=$content?></textarea>
            </div>
            <div class=" col-sm-offset-3 col-sm-9">
                <div id="contentWarning" class="alert alert-danger" style="display:
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
            <label class="col-sm-3">Изображение</label>
            <label class="col-sm-9" >
                <span id="chooseLabel" class="btn btn-default">Выберите файл...</span>
                <input type="file" id="chooseFileBtn" name="image" style="display: none">
            </label>
            <br>
            <div class="col-sm-offset-3 col-sm-9">
                <div class="alert alert-danger" style="display:
                <?php
                if(isset($errors['image']) && !empty($errors['image'])){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                    ;" role="alert">
                    <?php
                    if(isset($errors['image'])){
                        foreach ($errors['image'] as $error){
                            echo "<p>$error</p>";
                        }
                    }
                    ?>
                </div>
                <div class="alert alert-success alert-dismissable" style="display:
                <?php
                if(isset($success) && !empty($success)){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                    ;" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php
                    if(isset($success)){
                        echo "<p>$success</p>";
                    }
                    ?>
                </div>
            </div>
            <script type="text/javascript">
                window.onload = function () {
                    $("#chooseFileBtn").change(function () {
                        if ($(this).val().lastIndexOf('\\')) {
                            var n = $(this).val().lastIndexOf('\\') + 1;
                        } else {
                            var n = $(this).val().lastIndexOf('/') + 1;
                        }
                        var fileName = $(this).val().slice(n);
                        $("#chooseLabel").text(fileName);
                    })
                };
            </script>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>
        </div>
    </form>

    <?php
    $selfPage = "admin?action=blogEdit&";
    include_once 'views/includes/blogPaginator.php';
    ?>

</section>