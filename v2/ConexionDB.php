<?php

class ConexionDB {

    private $strhost = "localhost";         
    private $strUser = "TU_NOMBRE_DE_USUARIO";
    private $strPass = "TU_CONTRASEÑA";
    private $strDataBase = "TU_BASE_DE_DATOS";
    private $connect;
    
    function __construct(){
        $strConexion = "mysql:hos=".$this-> strhost .";dbname=".$this-> strDataBase.";charset=utf8";
        try {
            $this->connect = new PDO($strConexion, $this->strUser, $this->strPass); 
            $this->connect ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (exception $e) {
            $this->connect = 'Falló la conexión: ' . $e->getMessage();
            echo $this->connect;
        }
        
        
    }
    
    public function connect(){
        return $this->connect;
    }
    
}
?>