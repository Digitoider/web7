<section class="personal_information">
    <div id="photoalbum">
        <?php
        function formPhotosHTML($photosPaths)
        {
            $titles = array("Город", "Трава", "Дерево", "Машина", "Ассасин", "Планеты", "Город", "Планеты", "Пляж", "Туманный восход", "Планета Земля",
                "Невообразимо красивое фото", "Пляж", "Аллея за поворотом", "Аллея");

            $innerHTML = "";
            $i=1;
            for(; $i < count($titles); $i++){
                if(($i-1) % 4 == 0){
                    if($i != 0 ){
                        $innerHTML .= "</div>";
                    }
                    $innerHTML .= "<div class='row'>";
                }
                $innerHTML .= "<div class='col-sm-3'><img src='" . $photosPaths[$i-1] . "' title='" .
                    $titles[$i-1] . "' class='img-thumbnail'></div>";
            }
            if(($i-1) % 4 !== 0){
                $innerHTML .= "<div class='row'>";
            }

            return $innerHTML;
        }
        $controller = new Photoalbum_controller();
        $photosPaths =  $controller->getPhotosPaths();
        echo formPhotosHTML($photosPaths);
        ?>
    </div>

    <div class="modal fade" id="photoviewerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header row">
                    <button class="btn btn-default col-sm-offset-9 col-sm-2" data-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <img id="bigPhoto" class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                    </div>
                    <p id="bigPhotoTitle"></p>
                </div>
                <div class="modal-footer row">
                    <button id="showPrevPhotoBtn" class="btn btn-default col-sm-offset-2 col-sm-4">Prev</button>
                    <button id="showNextPhotoBtn" class="btn btn-default  col-sm-4">Next</button>
                </div>
            </div>
        </div>
    </div>
</section>