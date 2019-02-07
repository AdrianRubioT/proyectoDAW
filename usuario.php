<?php
    class usuario{
        
        private $correo;
        private $user;
        // private $pass; 
        private $loged;
        
        
        public function __construct($correo, $pass, $user, $loged){
            
            $this->correo = $correo;
            $this->user = $user;
            $this->loged = $loged;
        }
        
        public function __construct1(){
            
            $this->correo = "";
            $this->user = "";
            $this->loged = false;
        }
        
        
        public function setCorreo($newCorreo){
            $this->correo = $newCorreo;
        }
        
        public function setUser($newUser){
            $this->user= $newUser;
        }
        
        public function setLoged($newLoged){
            $this->loged = $newLoged;
        }
        

        public function getLoged(){
            return $this->loged;
        }
        
        public function getNombre(){
            return $this->nombre;
        }
        
        public function getCorreo(){
            return $this->correo;
        }
        
    }


?>