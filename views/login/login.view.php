<?php
@session_start();
$user = !empty($_SESSION['user']) ? $_SESSION['user'] : null;
if ($user) {
    header('Location: index.php?c=usuario&a=index');
    die();
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Iniciar sesión</title>
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

<body class="body_login">
    <div class="container div_principal login">
        <div class="card card_login">
            <div class="card-body">
                <div class="card-title d-flex title_card_login">
                    <h5> Natural Life</h5>
                </div>
                <div class="div_img_">
                    <img src="./assets/img/user.png" class="img-user" alt="">
                </div>
                <div class="md-form">
                    <input type="text" id="user" class="form-control">
                    <label for="form1">Usuario *</label>
                </div>
                <div class="md-form">
                    <input id="password" type="password" class="form-control">
                    <label for="form1">Contraseña *</label>
                </div>
            </div>
            <div class="alerts" id="alert">

            </div>
            <div class="card-footer">
                <button type="button" onclick="login();" class="btn btn-primary login_button">Iniciar Sesión</button>
            </div>
        </div>
    </div>
</body>
<footer>

    <!-- jQuery -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript" src="assets/js/personalice.js"></script>

</footer>

</html>