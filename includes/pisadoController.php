<?php
/**
 * Created by PhpStorm.
 * User: yago
 * Date: 19/11/13
 * Time: 19:47
 */

include_once 'includes/pisado.php';
include_once 'includes/mysql.php';

class pisadoCrontroller {
    public $error;
    public $hash;
    public $pisado;

    public function insertPisado() {
        if (isset($_POST['texto']) && isset($_POST['email'])) {
            $this->hash = md5(uniqid(rand(), TRUE));
            $pisado = new Pisado(0,$this->hash,$_POST['email'],$_POST['texto']);
            $mysqld = new Mysql();
            $mysqld->insertPisado($pisado);
        } else {
            $this->$error ='No email or text input';
        }
    }
    public function viewPisado($hash) {
        $mysqld = new Mysql();
        $this->pisado = $mysqld->getPisado($hash);
    }
} 