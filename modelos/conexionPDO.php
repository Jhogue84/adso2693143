<?php

class ConexionPDO{
    private $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=localhost; dbname=api2693143","root","");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexion exitosa con pdo";
        } catch (PDOException $e) {
            die("Error de conexion PDO:  ". $e->getMessage());
        }
        
    }

    public function consultaPreparada($cadenaSql, $valores = [], $tipoValores =""){
        //select, insert, update, delete
        if($valores){
            //ejcuta la sentencia preparada con valores
            $rta = $this->conexion->prepare($cadenaSql);
            //$rta->bindParam($tipoValores, ...$valores);
            //1-2-3-4
            //SET nombre =? , valor_unitario=?, cantidad =? WHERE id =?
            for($i=0; $i < count($valores); $i++){
                $rta->bindParam($i+1,$valores[$i]);
            }
            $rta->execute();
            //$rta->execute($valores);
            return $rta->fetchAll(PDO::FETCH_ASSOC);

        }else{
            //consutla select
            return $this->conexion->query($cadenaSql)->fetchAll(PDO::FETCH_ASSOC);
        }

        

    }
}