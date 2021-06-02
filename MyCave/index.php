<?php

include(__DIR__ . '/include/header.php');

echo '<div class="row row-cols-1 row-cols-md-4 g-8">';

require 'admin/database.php';
$db = Database::connect();
$statement = $db->query('SELECT id, name, description, picture FROM articles');

while ($articles = $statement->fetch()) {
    echo '<div class="col">
                            <div class="card">
                            <img class="card-img-top" src="/assets/img/' . $articles['picture'] . '" alt="...">
                            <div class="card-body">
                                    <h5 class="card-title" >' . $articles['name'] . '</h5>
                                    <p class="card-text">' . $articles['description'] . '</p>
                                    <a href="admin/index.php?" class="btn btn-danger">Liste Articles</a>
                                </div>
                            </div>
                        </div>';
}

echo    '</div>
                    </div>';

Database::disconnect();
echo  '</div>';
?>


<footer>

    <div class="footer-copyright text-center py-3">© 2020 Copyright :
        <a>Don Jo</a>
    </div>


</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>

</html>