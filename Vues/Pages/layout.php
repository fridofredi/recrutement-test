<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CRUD admin">
    <meta name="author" content="Edogawa Cédric">
    <link rel="icon" href="images/favicon.ico">

    <title> CRUD </title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="Vues/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="Vues/assets/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="Vues/assets/css/style.css" rel="stylesheet">
</head>


<body class="grey lighten-3">

<!--Main Navigation-->
<header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand waves-effect" href="#" target="_blank">
                <strong class="blue-text">Test</strong>
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="index.php?page=Default" class="list-group-item active waves-effect">
                            <i class="fas fa-chart-pie mr-3"></i>Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=Auth/logout"
                           class="list-group-item list-group-item-action waves-effect">
                            <i class="fas fa-money-bill-alt mr-3"></i>Déconnexion</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

        <a class="logo-wrapper waves-effect">
            Recrutement-Test
        </a>

        <div class="list-group list-group-flush">
            <a href="index.php?page=Default" class="list-group-item active waves-effect">
                <i class="fas fa-chart-pie mr-3"></i>Accueil
            </a>
            <a href="index.php?page=Gestionnaire" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-user mr-3"></i>Gestionnaire</a>
            <a href="index.php?page=Technicien" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-user mr-3"></i>Technicien</a>
            <a href="index.php?page=Type_vehicule" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-map mr-3"></i>Type de véhicule</a>
            <a href="index.php?page=Vehicule" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-car mr-3"></i>Vehicule</a>
        </div>

    </div>
    <!-- Sidebar -->

</header>
<!--Main Navigation-->

<!--Main layout-->
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <?=$content?>
    </div>
</main>
<!--Main layout-->

<!--Footer-->
<footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

    <!--Copyright-->
    <div class="footer-copyright py-3">
        © 2019 Copyright CedricS - Recrutement Test
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="Vues/assets/js/jquery-3.4.0.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="Vues/assets/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="Vues/assets/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="Vues/assets/js/mdb.min.js"></script>
<script>
    new WOW().init();
    // Data Picker Initialization
    $('.datepicker').pickadate();
</script>
</body>

</html>
