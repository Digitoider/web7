<?php
$selfPage = "admin?action=showVisitors";

//require_once 'controllers/admin/blogEdit_controller.php';
$controller = new Admin_controller();

$visitorsPerPage = 10;

//echo "<p>self page: $selfPage</p>";
$visitorsAmount = $controller->getVisitorsAmount();
//echo "<p>Amount of posts: $postsAmount</p>";
$pagesAmount = ceil( $visitorsAmount/$visitorsPerPage);

$currentPageNumber = 1;
if(isset($_GET['page'])){
    $currentPageNumber = $_GET['page'];
    if($currentPageNumber > $pagesAmount){
        $currentPageNumber = $pagesAmount;
    }else if($currentPageNumber < 1){
        $currentPageNumber = 1;
    }
}

$visitors = $controller->getVisitors(($currentPageNumber-1)*$visitorsPerPage, $visitorsPerPage);
//var_dump($posts);
?>
<section class="container">
    <table class="table table-bordered table-striped table-hover table-responsive">
        <thead>
        <th>IP</th>
        <th>Браузер</th>
        <th>Страница</th>
        <th>Дата и время посещения</th>
        </thead>
        <tbody>
        <?php

        foreach ($visitors as $visitor):
            ?>
            <tr>
                <td><?=$visitor->ip?></td>
                <td><?=$visitor->browser?></td>
                <td><?=$visitor->page?></td>
                <td><?=$visitor->visitedAt?></td>
            </tr>
        <?php endforeach;?>
        </tbody>

    </table>

    <div class="container-fluid">
        <nav aria-label="Page navigation">
            <div class="row">
                <div class="col-sm-offset-2 col-sm-8">

                    <div class="btn-group" role="group">
                        <a class="btn btn-default">Всего страниц</a>
                        <a class="btn btn-info" href="<?php echo"$selfPage&page=$pagesAmount"?>"><?=$pagesAmount?></a>
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
                                echo "$selfPage&page=" . ($currentPageNumber-1);
                            }
                            ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php

                        function renderPaginator($prev, $next, $currentPageNumber, $selfPage){
                            foreach ($prev as $i){
                                echo "<li><a href='$selfPage&page=$i'>$i</a></li>";
                            }

                            echo "<li class='active'><a>$currentPageNumber</a></li>";

                            foreach ($next as $i){
                                echo "<li><a href='$selfPage&page=$i'>$i</a></li>";
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
                                echo "$selfPage&page=" . ($currentPageNumber+1);
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
</section>