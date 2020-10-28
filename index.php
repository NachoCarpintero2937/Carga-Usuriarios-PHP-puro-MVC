<?php
require_once 'config/config.php';
require_once 'core/router.php';

$controller = !empty($_GET['c']) ? $_GET['c'] : '';
$action = !empty($_GET['a']) ? $_GET['a'] : '';
if ($controller && $action) {
    //Actions excluidos para ajax
    if (!in_array($action, $exclude_actions))
        require_once 'views/meta/navbar.view.php';
    // body
    $controller = loadController($controller);
    loadAction($controller, $action);
    // footer misma validacion
    if (!in_array($action, $exclude_actions))
        require_once 'views/meta/footer.view.php';
} else {
    $controller = loadController('login');
    loadAction($controller, 'index');
}
