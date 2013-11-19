<?php
/**
 * Created by PhpStorm.
 * User: yago
 * Date: 19/11/13
 * Time: 23:36
 */ ?>

<div class="row">
    <div class="col-md-7 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>Viendo pisado</b></div>
            <div class="panel-body">
                <?= nl2br($pisadoController->pisado->getTexto()) ?>
                <hr>
                Hash: <?= $pisadoController->pisado->getHash() ?>
                <hr>
                Email: <?= $pisadoController->pisado->getEmail() ?>
            </div>
        </div>
    </div>
</div>