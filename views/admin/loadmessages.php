<?php
    if(isset($_FILES['messages'])){
        $type = $_FILES['messages']['type'];
        //echo "<p style='margin-top: 50px;'>MIME type: '$type'</p>";

        if(strcmp($type, 'text/plain') != 0){
            $error = "Тип загруженного файла не является верным";
        }
        else{
            $src = $_FILES['messages']['tmp_name'];
            $str = file_get_contents($src);
            if(mb_detect_encoding($str, 'UTF-8', true)){
                $dst = 'userdata/messages.inc';
                if(copy($src, $dst)){
                    $success = "Файл успешно загружен на сервер";
                }else{
                    $error = "Не удалось загрузить файл";
                }
            }
            else{
                $error = "Кодировка файла должна быть UTF-8";
            }
        }

    }else{
        $error = "Файл не выбран";
    }
?>
<section class="container ">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="page-header"><h1>Загрузить файл <i>messages.inc</i></h1></div>
        <div class="form-group">
            <label class="col-sm-6 btn btn-default" >
                <span id="chooseLabel">Выберите файл... </span>
                <input type="file" id="chooseFileBtn" name="messages" style="display: none">
            </label>
            <div class="col-sm-6">
                <button type="submit" id="submitBtn" class="btn btn-primary">Отправить </button>
            </div>
            <script type="text/javascript">

                window.onload = function () {
                    $("#submitBtn").addClass("disabled");
                    $("#chooseFileBtn").change(function () {
                        if ($(this).val().lastIndexOf('\\')) {
                            var n = $(this).val().lastIndexOf('\\') + 1;
                        } else {
                            var n = $(this).val().lastIndexOf('/') + 1;
                        }
                        var fileName = $(this).val().slice(n);
                        $("#chooseLabel").text(fileName);
                        //$("#submitBtn").enable();
                        $("#submitBtn").removeClass("disabled");
                    })
                };
            </script>
            <br>
            <div class="col-sm-6">
                <div class="alert alert-danger" style="display:
                <?php
                if(isset($error) && !empty($error)){
                    echo "block";
                } else {
                    echo "none";
                }
                ?>
                        ;" role="alert">
                    <?php
                    if(isset($error)){
                        echo "<p>$error</p>";
                    }
                    ?>
                </div>
                <div class="alert alert-success" style="display:
                <?php
                if(isset($success) && !empty($success)){
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
    </form>
</section>