<section class="container personal_information">
    <div id="myinterests">
        <div>
            <div class="page-header"><h2>Содержание</h2></div>
            <a href="#hobbyAnchor" class="thumbnail">Хобби<br></a>
            <a href="#booksAnchor" class="thumbnail">Книги<br></a>
            <a href="#musicAnchor" class="thumbnail">Музыка<br></a>
            <a href="#movieAnchor" class="thumbnail">Фильмы<br></a>
        </div>
        <div class="page-header"></div>
        <div>
            <a name="hobbyAnchor">
                <h2>Хобби</h2>
            </a>
            <?php
            $controller = new Myinterests_controller();
            function formInterestsHTML($interests){
                $ol = "<ol>";

                foreach($interests as $interest){
                    $ol .= "<li>" . $interest . "</li>";
                }

                return $ol . "</ol>";
            }
            ?>
            <?php
            $hobbies = $controller->getMyInterests('hobby');
            echo formInterestsHTML($hobbies);
            ?>
            <!--				<p id="hobby"><ol><li>Lorem</li><li>Ipsum</li><li>Dolor</li><li>ANIME</li><li>Amet</li><li>Nostrum non</li><li>Recusandae</li><li>Suscipit</li></ol></p>-->
            <a name="booksAnchor">
                <h2>Книги</h2>
            </a>
            <?php
            $books = $controller->getMyInterests('books');
            echo formInterestsHTML($books)
            ?>
            <!--				<p id="books"><ol><li>Dolor</li><li>Sit</li><li>Amet</li></ol></p>-->
            <a name="musicAnchor">
                <h2>Музыка</h2></a>
            <?php
            $music = $controller->getMyInterests('music');
            echo formInterestsHTML($music)
            ?>
            <!--				<p id="music"><ol><li>Metallica</li><li>Irish themes</li><li>Mozart</li><li>Oxxxy</li><li>Nigga rap</li></ol></p>-->
            <a name="movieAnchor">
                <h2>Фильмы</h2>
            </a>
            <?php
            $movies = $controller->getMyInterests('movies');
            echo formInterestsHTML($movies)
            ?>
            <!--				<p id="movie"><ol><li>Avengers</li><li>NARUTO</li><li>Iron man</li><li>Konosuba</li><li>Death note</li><li>Future diary</li><li>etc</li></ol></p>-->
        </div>
    </div>
</section>