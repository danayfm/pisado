<?php

// Example: wget -qO- 'http://localhost/pisado/test.php?login' --post-data 'user_nia=NIA&user_password=PASSWD' | more

include 'includes/user.php';

$user = new User();

if ($user->user_is_logged_in){
	print ('NIA: '.$user->user_nia);
	print ('EMAIL: '.$user->user_email);
	print ('NAME: '.$user->user_name);
}

else {
	print ($user->error);
}
?>
