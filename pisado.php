<?php
    include_once 'includes/pisadoController.php';
    include 'includes/user.php';

    $user = new User();
    $pisadoController = new pisadoCrontroller();

    include 'tmpl/head.php';

    if (isset($_POST['insertPisado']) ) {
        $pisadoController->insertPisado();
        $pisadoController->viewPisado($pisadoController->hash);
        /* Segun los publica,lo muestra */
        include 'tmpl/viewpisado.php';
    } else {
        include 'tmpl/newpisado.php';
    }
    include 'tmpl/footer.php';

?>