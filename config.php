<?php

/* Define ABSPATH as this files directory. */
define( 'ABSPATH', dirname(__FILE__) . '/' );

/* Roles mas privilegios = un numero mas grande. */
define('ROL_DELEGADO', 10);
define('ROL_DELE_TITULACION', 50);
define('ROL_DELE_ESCUELA', 100);

// LDAP Parameters
define('LDAP_HOST', 'ldaps://ldap.uc3m.es');
define('LDAP_BASEDN', 'ou=Alumnos,ou=Gente,o=Universidad Carlos III,c=es');
define('LDAP_IDFIELD', 'uid');
define('LDAP_NAMEFIELD', 'cn');
define('LDAP_MAILFIELD', 'mail');
define('LDAP_MAILALIASFIELD', 'uc3mcorreoalias');
date_default_timezone_set('Europe/Madrid');

/* SQL Parameters */
define('SQL_HOST', 'localhost');
define('SQL_DB', 'pisado');
define('SQL_PASSWD', 'pisado');
define('SQL_USER', 'pisado');
define('SQL_PORT', 3306);
?>
