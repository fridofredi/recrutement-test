<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CRUD admin">
    <meta name="author" content="Edogawa Cédric">
    <link rel="icon" href="images/favicon.ico">

    <title> Recrutement - Login </title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="Vues/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="Vues/assets/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="Vues/assets/css/style.css" rel="stylesheet">
</head>


<body class="grey lighten-3">

<!--Main layout-->
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <div class="card col-md-6">

            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Connexion</strong>
            </h5>

            <div class="card-body px-lg-5 pt-0">

                <form action="index.php?page=Auth/log" method="post" class="md-form" style="color: #757575;">

                    <div class="md-form">
                        <input type="text" name="username" id="materialLoginFormEmail" class="form-control">
                        <label for="materialLoginFormEmail">Nom d'utilisateur</label>
                    </div>

                    <div class="md-form">
                        <input type="password" name="password" id="materialLoginFormPassword" class="form-control">
                        <label for="materialLoginFormPassword">Mot de passe</label>
                    </div>

                    <div>
                        <select name="type" class="browser-default custom-select mb-4" id="select">
                            <option value="" disabled selected>Type d'utilisateur</option>
                            <option value="administrateur">Administrateur</option>
                            <option value="gestionnaire">Gestionnaire</option>
                            <option value="technicien">Technicien</option>
                        </select>
                    </div>

                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"
                            type="submit">Se connecter
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
<!--Main layout-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="Vues/assets/js/jquery-3.4.0.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="Vues/assets/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="Vues/assets/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="Vues/assets/js/mdb.min.js"></script>
</body>

</html>
