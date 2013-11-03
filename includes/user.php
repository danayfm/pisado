<?php
	/**
	 * user.php
	 * @version 0.1
	 * @author Yago Pérez Sáiz <yaperezs@gmail.com>
	 * para Delegación de Estudiantes - Universidad Carlos III de Madrid.
	 * 
	 * Provide functions for user login. 
	 */
	 
	require_once dirname(__FILE__) . '/../config.php';
	include_once ABSPATH . '/includes/ldap_gateway.php';
	 	
	class User {
		
		private $user_nia = "";
		private $user_name = "";
		private $user_email = "";
		private $user_is_logged_in = false;	
			
		/* Start */
		public function __construct() {
			session_start(); // Our session
			
			/* Close session */
			if (isset($_GET["logout"])) {
				$this->doLogout();
			}
			
			/* Is aleready loged in */	
			elseif (!empty($_SESSION['user_nia']) && ($_SESSION['user_logged_in'] == 1)) {
				$this->loginWithSessionData();
			}
			
			/* Tring to login */
			elseif (isset($_POST["login"])) {
				$this->loginWithPostData($_POST['user_nia'], $_POST['user_password']);
			}
		}
		
		private function loginWithSessionData() {
			$this->user_nia = $_SESSION['user_nia'];
			$this->user_email = $_SESSION['user_email'];
			$this->user_is_logged_in = true;
		}
		
		#TODO change to private
		public function loginWithPostData($user_name, $user_password) {
			if (empty($user_name)) {
				$this->errors[] = 'Por favor, rellene el NIA';
			}
			 
			else if (empty($user_password)) {
				$this->errors[] = 'Por favor, rellene la contraseña';
			}
			
			$user = LDAP_Gateway::login($user_name, $user_password);
			
			if($user) {
				/* Username and password are correct */
				$_SESSION['user_nia'] = $user->getUserId ();
				$_SESSION['user_email'] = $user->getUserMail();
				$_SESSION['user_name'] = $user->getUserNameFormatted();				
				$_SESSION['user_logged_in'] = 1;
			}
			var_dump($_SESSION);
		}
	}
?>
