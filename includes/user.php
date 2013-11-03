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
		
		public $user_nia ;
		public $user_name ;
		public $user_email ;
		public $user_is_logged_in = false;
		public $error = "";
					
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
			
			/* Trying to login */
			elseif (isset($_GET["login"])) {
				$this->loginWithPostData($_POST['user_nia'], $_POST['user_password']);
			}
		}
		
		private function loginWithSessionData() {
			$this->user_nia = $_SESSION['user_nia'];
			$this->user_email = $_SESSION['user_email'];
			$this->user_is_logged_in = true;
		}
				
		private function loginWithPostData($user_name, $user_password) {
			if (empty($user_name)) {
				$this->error = 'Por favor, rellene el NIA';
			}
			 
			else if (empty($user_password)) {
				$this->error = 'Por favor, rellene la contraseña';
			} else {
			
				$user = LDAP_Gateway::login($user_name, $user_password);
				
				if($user) {
					/* Username and password are correct */
					$_SESSION['user_nia'] = $user->getUserId ();
					$_SESSION['user_email'] = $user->getUserMail();
					$_SESSION['user_name'] = $user->getUserNameFormatted();				
					$_SESSION['user_logged_in'] = 1;
					
					var_dump($_SESSION);
					$this->user_nia = $user->getUserId();
					$this->user_name = $user->getUserNameFormatted();
					$this->user_email = $user->getUserMail();
					$this->user_is_logged_in = true;
				}
				else {
					$this->error = 'Falló el login!';
				}
			}
		}
	}
?>
