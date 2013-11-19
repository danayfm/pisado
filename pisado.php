<?php
    include_once 'includes/pisadoController.php';
    include 'includes/user.php';

    $user = new User();
    $pisado = new pisadoCrontroller();
    include 'tmpl/head.php';

    if (isset($_POST['insertPisado']) ) {
        $pisado->insertPisado();
    } else {
        include 'tmpl/newpisado.php';
    }
    include 'tmpl/footer.php';

?>