<?php

require_once("autoload.php");

class criptomoneda extends ConexionDB{
    
    public function __construct(){
        $this->conexion = new ConexionDB();
        $this->conexion = $this->conexion->connect();
    }

    public function createCode(int $ancho){
        $this->strCode = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $ancho);
        return $this->strCode;
    }

    public function insControl(string $codigo){
        $this->strFecha = date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO ccat (codigo, fecha) VALUES (?,?)";
        $insert = $this->conexion ->prepare($sql);
        $arrData = array($codigo, $this->strFecha);
        $exInsert = $insert->execute($arrData);
        $mensaje = "El registro fue guardado con exito";
        return $mensaje;
    }

    public function insCripto(string $codigo, string $rank, string $nombre, string $simbolo, float $maxSupply, float $precio, float $circulante, float $volumen, float $cambio, float $market, float $dominancia){
       
        $sql = "INSERT INTO criptomercado (codigo, rank, nombre, simbolo, max_supply, precio, circulante, volumen24h, cambio1hr, marketcap, dominancia) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $insert = $this->conexion ->prepare($sql);
        $arrData = array($codigo, $rank, $nombre, $simbolo, $maxSupply, $precio, $circulante, $volumen, $cambio, $market, $dominancia);
        $exInsert = $insert->execute($arrData);
        $mensaje = "El registro fue guardado con exito";
        return $mensaje;
    }

}





?>