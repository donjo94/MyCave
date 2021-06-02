<?php

require 'database.php';

if (!empty($_GET['id'])) {

    $id = checkInput($_GET['id']);
}

$db = Database::connect();
$statement = $db->prepare('SELECT id, name, year, grapes , country, region, description, picture FROM articles WHERE id= ?');
$statement->execute(array($id));
$articles = $statement->fetch();
Database::disconnect();


function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include('../include/header.php');
?>


<div class="container-fluid admin">
    <div class="row">
        <div class="col-sm-6">
            <h2><strong>Voir un Article</strong></h2>
            <br>
            <form>
                <div class="form-group">
                    <div class="thumbnail">
                        <img class="okok" src="<?php echo '/assets/img/' . $articles['picture']; ?>" alt="...">
                    </div>
                </div>

                <div class="form-group">
                    <label>Nom :</label><?php echo ' ' . $articles['name']; ?>
                </div>
                <div class="form-group">
                    <label>Year :</label><?php echo ' ' . $articles['year']; ?>
                </div>
                <div class="form-group">
                    <label>Grapes :</label><?php echo ' ' . $articles['grapes']; ?>
                </div>
                <div class="form-group">
                    <label>Country :</label><?php echo ' ' . $articles['country']; ?>
                </div>
                <div class="form-group">
                    <label>Region :</label><?php echo ' ' . $articles['region']; ?>
                </div>
                <div class="form-group">
                    <label>Description :</label><?php echo ' ' . $articles['description']; ?>
                    <br> <br>
                    <a class="btn btn-primary" href="index.php">Retour</a>
                </div>

            </form>

        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

        </body>

        </html>