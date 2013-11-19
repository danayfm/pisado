<?php
	class Pisado {
		private $id;
		private $hash;
		private $email;
        private $texto;


        function __construct ($id=NULL, $hash=NULL, $email=NULL, $texto=NULL) {
            $this->email = $email;
            $this->id = $id;
            $this->texto = $texto;
            $this->hash = $hash;
        }
        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return nl2br(htmlspecialchars($this->email));
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $texto
         */
        public function setTexto($texto)
        {
            $this->texto = htmlspecialchars($texto);
        }

        /**
         * @return mixed
         */
        public function getTexto()
        {
            return htmlspecialchars($this->texto);
        }

        /**
         * @param mixed $hash
         */
        public function setHash($hash)
        {
            $this->hash = $hash;
        }

        /**
         * @return mixed
         */
        public function getHash()
        {
            return $this->hash;
        }
		
		
	}
?>
