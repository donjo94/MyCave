<?php include('../include/header.php'); ?>

<div class="row">

    <h1 class="ita">Liste des Articles</h1>


    <table class="table table-bordered table-dark">

        <thead>
            <tr class="ok">
                <th scope="col">Nom</th>
                <th scope="col">Year</th>
                <th scope="col">Grapes</th>
                <th scope="col">Country</th>
                <th scope="col">Region</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            require 'database.php';
            $db = Database::connect();
            $statement = $db->query('SELECT id, name, year, grapes ,country,region,description  FROM articles');
            while ($articles = $statement->fetch()) {

                echo '<tr>';
                echo '<td>' . $articles['name'] . '</td>';
                echo '<td>' . $articles['year'] . '</td>';
                echo '<td>' . $articles['grapes'] . '</td>';
                echo '<td>' . $articles['country'] . '</td>';
                echo '<td>' . $articles['region'] . '</td>';
                echo '<td>' . $articles['description'] . '</td>';

                echo '<td width=300>';
                echo '<a class="btn btn-light" href="view.php?id=' . $articles['id'] .  '"> Voir </a>';
                echo ' ';


                if (isset($_SESSION['connected'])) {
                    echo '<a class="btn btn-warning" href="insert.php?id=' . $articles['id'] . '"> Ajouter </a>';
                    echo ' ';
                    echo '<a class="btn btn-primary" href="update.php?id=' . $articles['id'] . '"> Modifier </a>';
                    echo ' ';
                    echo '<a class="btn btn-danger" href="delete.php?id=' . $articles['id'] . '"> Supprimer </a>';
                    echo ' ';
                }


                echo ' ';
                echo '</td>';
                echo '</tr>';
            }
            Database::disconnect();
            ?>
    </table>
    </tbody>
</div>
</div>

<footer>

    <div class="footer-copyright text-center py-3">© 2020 Copyright :
        <a>Don Jo</a>
    </div>


</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>