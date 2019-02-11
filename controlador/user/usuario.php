<?php
    class usuario{
        
        private $correo;
        private $user;
        private $loged;
        
        
        public function __construct($correo, $user, $loged){
            
            $this->correo = $correo;
            $this->user = $user;
            $this->loged = $loged;
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
        
        public function getUser(){
            return $this->user;
        }
        
        public function getCorreo(){
            return $this->correo;
        }
        
    }

function usuarioVacio(){
    return new usuario("","",false);
}


?>