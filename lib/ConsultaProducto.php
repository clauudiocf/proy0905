<?php 

class ConsultaProducto{
    
private function Conexion(){
    $miconn=new mysqli("localhost", "root", "avaras08", "ventas");
        if($miconn->connect_errno){
            return "Fallo al conectar a MySQL: (" .$miconn->connect_errno.")".$miconn->connect_errno;
        }
        return $miconn;
    }
    public function Lista(){
        $sql = "SELECT * FROM Productos";
        $resultado = $this->Conexion()->query($sql);
        
        $i = 0;
        while($fila = $resultado->fetch_assoc()){
            $oProducto= new Producto($fila("nombre"),$fila("precio"),$fila("codigo"));
            $aProducto[$i]=$oProducto;
        }
        return $aProducto;
    }
}