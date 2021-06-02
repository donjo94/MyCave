<?php

include('../include/header.php');
?>

<body>

    <main>
        <div class="bg-container">
            <div class="btn-co">
                <a href="#"><i class="fas fa-chevron-left"></i></a>
            </div>

            <div class="connexion-cont">
                <!-- <h1>My Cave</h1> -->
                <form action="/admin/traitementConnexion.php" method="POST">
                    <input type="email" id="email" name="email" placeholder="Email"><br>
                    <input type="password" id="password" name="password" placeholder="Mot de passe"><br>
                    <input type="submit" id="submit" value="CONNEXION">
                </form>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    </html>