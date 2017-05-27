<?php
    if(!isset($selfPage)){
        $selfPage = 'blog?';
    }
    require_once 'controllers/admin/blogEdit_controller.php';
    $controller = new BlogEdit_controller();

    $postsPerPage = 5;

    //echo "<p>self page: $selfPage</p>";
    $postsAmount = $controller->getPostsAmount();
//echo "<p>Amount of posts: $postsAmount</p>";
    $pagesAmount = ceil( $postsAmount/$postsPerPage);

    $currentPageNumber = 1;
    if(isset($_GET['page'])){
        $currentPageNumber = $_GET['page'];
        if($currentPageNumber > $pagesAmount){
            $currentPageNumber = $pagesAmount;
        }else if($currentPageNumber < 1){
            $currentPageNumber = 1;
        }
    }

    $posts = $controller->getPosts(($currentPageNumber-1)*$postsPerPage, $postsPerPage);
    //var_dump($posts);
?>
<div class="form-horizontal">
    <div class="page-header"></div>

    <?php foreach ($posts as $post):?>
    <div class='panel'>
        <div class='panel-body' style='color: #2B4B4D;'>
            <div class="row">
                <div class="col-sm-3">Опубликован: </div>
                <div class="col-sm-9"><?=$post->savingDateTime?> </div>
            </div>
            <div class="row">
                <div class="col-sm-3">Тема: </div>
                <div class="col-sm-9"><?=$post->subject?></div>
            </div>
            <div class="row">
                <div class="col-sm-3">Изображение:</div>
                <div class="col-sm-9">
                    <?php
                        if($post->imagePath != ''){
                            $imagePath = $post->imagePath;
                        }else{
                            $imagePath = "public/images/noImage.png";
                        }
                    ?>
                    <img src="<?=$imagePath?>" alt="Some Image">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">Сообщение:</div>
                <div class="col-sm-9"><?=$post->content?></div>
            </div>
        </div>
    </div>
    <?php endforeach;?>



    <nav aria-label="Page navigation">
        <div class="row">
            <div class="col-sm-offset-2 col-sm-8">

                <div class="btn-group" role="group">
                    <a class="btn btn-default">Всего страниц</a>
                    <a class="btn btn-info" href="<?php echo $selfPage. "page=" .$pagesAmount?>"><?=$pagesAmount?></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-offset-2 col-sm-8">
                <ul class="pagination">
                    <li>
                        <a href="
                        <?php
                        if($currentPageNumber > 1){
                            echo $selfPage . "page=" . ($currentPageNumber-1);
                        }
                        ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php

                    function renderPaginator($prev, $next, $currentPageNumber, $selfPage){
                        foreach ($prev as $i){
                            echo "<li><a href='$selfPage" . "page=" . "$i'>$i</a></li>";
                        }

                        echo "<li class='active'><a>$currentPageNumber</a></li>";

                        foreach ($next as $i){
                            echo "<li><a href='$selfPage" . "page=" . "$i'>$i</a></li>";
                        }
                    }
                    $prev = [];
                    $next = [];
                    $rightAllowed = $pagesAmount - $currentPageNumber;// 2  1
                    $leftAllowed = $currentPageNumber - 1;            // 2  4
                    $k = 5;
                    if($leftAllowed <= 2){
                        for($i = 1; $i <= $leftAllowed; $i++){
                            $prev[] = $i;
                            $k--;
                        }
                        for($i = 1; $i <= $rightAllowed && $k > 1; $i++){
                            $next[] = $currentPageNumber+$i;
                            $k--;
                        }
                    }else if($rightAllowed <= 2){
                        for($i = 1; $i <= $rightAllowed; $i++){
                            $next[] = $currentPageNumber+$i;
                            $k--;
                        }
                        for($i = 1; $i <= $leftAllowed && $k > 1; $i++){
                            $prev[] = $currentPageNumber-$i;
                            $k--;
                        }
                    }else{
                        for($i = 1; $i <= 2; $i++){
                            $prev[] = $currentPageNumber-$i;
                            $next[] = $currentPageNumber+$i;
                        }
                    }
                    sort($prev, SORT_NUMERIC);
                    sort($next, SORT_NUMERIC);

                    renderPaginator($prev, $next, $currentPageNumber, $selfPage);
                    ?>
                    <li>

                        <a href="
                            <?php
                                if($currentPageNumber < $pagesAmount){
                                    echo $selfPage . "page=" . ($currentPageNumber+1);
                                }
                            ?>
                            " aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>