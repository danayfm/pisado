<?php
	/**
	 * user.php
	 * @version 0.2
	 * @author Yago Pérez Sáiz <yaperezs@gmail.com>
	 * para Delegación de Estudiantes - Universidad Carlos III de Madrid.
	 * 
	 * Provide functions for user login. 
	 */
	 
	require_once dirname(__FILE__) . '/../config.php';
	include_once ABSPATH . '/includes/ldap_gateway.php';
	 	
	class User {
		
		public $user_nia;
		public $user_name;
		public $user_email;
		public $user_domain;
		public $user_is_logged_in = false;
		public $error;
					
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
			elseif (isset($_POST["user_nia"])) {
				$this->loginWithPostData($_POST['user_nia'], $_POST['user_password']);
			}
		}
		
		private function loginWithSessionData() {
			$this->user_nia = $_SESSION['user_nia'];
			$this->user_email = $_SESSION['user_email'];
			$this->user_name = $_SESSION['user_name'];
			$this->user_domain = $_SESSION['user_domain'];
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
					$_SESSION['user_domain'] = $user->getDn();				
					$_SESSION['user_logged_in'] = 1;
					
					$this->user_nia = $user->getUserId();
					$this->user_name = $user->getUserNameFormatted();
					$this->user_email = $user->getUserMail();
					$this->user_domain = $user->getDn();	
					$this->user_is_logged_in = true;
				}
				else {
					$this->error = 'Contraseña / NIA incorrecto';
				}
			}
		}
		
		public function doLogout() {
			$_SESSION = array();
			session_destroy();
			$this->user_is_logged_in = false;
		}
		
		/* This is a exprerimental function */
		public function getCourse() {
			$ldap = explode(',', $this->user_domain);
			$titulacion = str_replace("ou=",'',$ldap[1]);
			return ucwords (strtolower($titulacion));
		}
	}
?>
