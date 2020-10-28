<?php
@session_start();
$user = !empty($_SESSION['user']) ? $_SESSION['user'] : null;
if (!$user) {
    header('Location: index.php');
    die();
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Carga de suarios</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="assets/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<header>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar_personalizado">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">
            <img src="https://www.natural-life.com.ar/img/natural-life-pet-logo-1515439413.jpg" width="180" alt="">
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Usuarios
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
            <div class="md-form my-0">
                <button onclick="logout();" class=" btn-logout"><i class="fas fa-sign-out-alt"></i></button>
            </div>

        </div>
    </nav>
</header>