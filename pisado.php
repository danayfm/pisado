<?php

    include 'includes/pisado.php';
    include 'includes/mysql.php';

    $pisado = New Pisado();
    $mysql = New Mysql();

    $pisados = $mysql->listPisados();
    foreach($pisados as  $pisado){
        echo $pisado->getEmail();
        $mysqld = new Mysql();
        $mysqld->insertPisado($pisado);
    }

?>