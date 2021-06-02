<?php

require 'database.php';

if (!empty($_GET['id'])) {
    $id = checkInput($_GET['id']);
}

if (!empty($_POST)) {
    $id = checkInput($_POST['id']);
    $db = Database::connect();
    $statement = $db->prepare("DELETE FROM articles WHERE id = ?");
    $statement->execute(array($id));
    Database::disconnect();
    header("Location: index.php");
}

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


include('../include/header.php');
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <h1 class="ttt"><strong>Supprimer un article</strong></h1>
            <br>
            <form class="form" role="form" action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                <div class="form-actions">
                    <button type="submit" class="btn btn-warning">Oui</button>
                    <a class="btn btn-danger" href="index.php">Non</a>
                </div>
            </form>
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



        </body>

        </html>