<?php
/**
 * User: yago
 * Date: 12/11/13
 * Time: 22:59
 */

require_once dirname(__FILE__) . '/../config.php';
require_once './pisado.php';

class Mysql {

    protected static $_instance;
    protected $_mysqli;

    public function __construct () {
        $this->_mysqli = new mysqli(SQL_HOST, SQL_USER, SQL_PASSWD, SQL_DB, SQL_PORT);
        if ($this->_mysqli->connect_errno) {
            die("Error MySQL conexion");
        }
        self::$_instance = $this;
    }

    public function insertPisado (Pisado $pisado){
        $email =  $pisado->getEmail();
        $hash = $pisado->getHash();
        $texto = $pisado->getTexto();

        $stmt = $this->_mysqli->prepare("INSERT INTO pisado (email,hash,texto) VALUES (?,?,?)")
        or die('There was a problem preparing statement');
        $stmt->bind_param('sss', $email,$hash,$texto)
        or die('There was a problem binding statement');
        $stmt->execute()
        or die('There was a problem executing statement');
        $this->_mysqli->close();

    }

    public function listPisados() {
        $result = $this->_mysqli->query("SELECT * FROM pisado")
        or die('There was a problem with DB');

        while ($obj = $result->fetch_object()) {
            $pisado = new Pisado($obj->id,$obj->hash,$obj->email,$obj->texto);
            $pisados[]=$pisado;
           }
        $this->_mysqli->close();
        //if (defined('pisados'))
        if (isset($pisados))
            return $pisados;
    }

    public function getPisado($hash) {
        $stmt = $this->_mysqli->prepare("SELECT * FROM pisado WHERE hash = ?")
        or die('There was a problem preparing statement');
        $stmt->bind_param('s', $hash)
        or die('There was a problem binding statement');
        $stmt->execute();

        $stmt->bind_result($id,$email,$hash,$texto);
        if ($stmt->fetch()) {
            $pisado = new Pisado($id, $hash, $email, $texto);
            $this->_mysqli->close();
            return $pisado;
        } else die('ERROR 999: Juanker detected.');
    }
} 