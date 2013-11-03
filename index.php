<?php

// Example: wget -qO- 'http://localhost/pisado/test.php?login' --post-data 'user_nia=NIA&user_password=PASSWD' | more

include 'includes/user.php';

$user = new User();

include 'tmpl/head.php';
include 'tmpl/bootinfo.php';
include 'tmpl/footer.php';

?>
