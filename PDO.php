<?php
class ClsPDO{
    static $Host;
    static $User;
    static $Passwd;
    static $dateTime;
    static $Conexion;
    static $Lenguaje;
    static $conector;
    function __construct(){
        self::Conectar();
    }
    public function Conectar(){
        $conexion = new ClsConexion();
        self::$conector = 'mysql';
        self::$Host     = 'mysql:host='.$conexion->Servidor.';port='.$conexion->Puerto.';dbname='.$conexion->BD;
        self::$Lenguaje = 'es';
        self::$User     = $conexion->Usuario;
        self::$Passwd   = $conexion->Contrasena;
        self::$dateTime = 'Y-m-d H:i:s';
        $on = true;
        try
        {
            self::$Conexion = new PDO(self::$Host, self::$User, self::$Passwd);
            self::$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$Conexion->exec("SET CHARACTER SET utf8");
            $on = true;
        }
        catch (PDOException $e)
        {
            exit();
        }
        return $on;
    }
    public function Desconectar(){
        if (isset(self::$Conexion)){
            self::$Conexion = NULL;
        }
    }
    public function URLBase(){
        $conexion = new ClsConexion();
        return $conexion->URLBase();
    }
    public function Conexion(){
        return self::$Conexion;
    }
    public function DateTime(){
        return self::$dateTime;
    }
    public function Ejecutar($procdureString){
        $conector =  (self::$conector == 'mysql')?'CALL':'EXEC';
        $string = $conector.' '.$procdureString;
        return $string;
    }
    public function CallSelect($consulta){
        try {
            $resultado = self::$Conexion->prepare($consulta);
            $resultado->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function querySelect($consulta,$tipo = NULL){
        try {
            $resultado = self::$Conexion->prepare($consulta);
            $resultado->execute();
            $zLista = array();
            $i = 0;
            switch ($tipo) {
                case NULL:
                    $count = $resultado->columnCount();
                    while($row = $resultado->fetch())
                    {
                        for ($j=0;$j < $count; $j++)
                        {
                            $nombre = $resultado->getColumnMeta($j);
                            $zLista[$i][$nombre['name']]= $row[$nombre['name']];
                        }
                        $i++;
                    }
                break;
                case 'NUMBER':
                    $count = $resultado->columnCount();
                    while($row = $resultado->fetch())
                    {
                        for ($j=0;$j < $count; $j++)
                        {
                            $nombre = $resultado->getColumnMeta($j);
                            $zLista[$i][$j]= $row[$nombre['name']];
                        }
                        $i++;
                    }
                break;
                case 1:
                    try {
                        while($row = $resultado->fetch())
                        {
                            $nombre = $resultado->getColumnMeta(0);
                            $zLista = $row[$nombre['name']];
                        }
                        } catch (Exception $e) {
                        echo var_dump('DEMACIADAS COLUMNAS - SOLO VALOR INDEPENDIENTE');
                    }
                break;
                case 2:
                    $count = $resultado->columnCount();
                    while($row = $resultado->fetch())
                    {
                        for ($j=0;$j < $count; $j++)
                        {
                            $nombre = $resultado->getColumnMeta($j);
                            $zLista[$nombre['name']]= $row[$nombre['name']];
                        }
                        $i++;
                    }
                break;
                case 3:
                    $count = $resultado->columnCount();
                    while($row = $resultado->fetch())
                    {
                        array_push($zLista,$row[0]);
                    }
                break;
            }
            return $zLista;
        } catch (Exception $e) {
            echo var_dump('HA OCURRIDO UN PROBLEMA');
        }
    }
    public function queryInsert($consulta,$array){
        try {
            $resultado = self::$Conexion->prepare($consulta);
            $resultado->execute($array);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function queryUpdate($consulta_,$array_){
        $resultado = '';
        try {
            $resultado = self::$Conexion->prepare($consulta_);
            $resultado->execute($array_);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function queryDelete($consulta,$array = NULL){
        try {
            $resultado = self::$Conexion->prepare($consulta);
            if ($array != NULL) {
                $resultado->execute($array);
            }else{
                $resultado->execute();
            };
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function PDODelete($consulta,$array = NULL){
        try {
            $resultado = self::$Conexion->prepare($consulta);
            if ($array != NULL) {
                $resultado->execute($array);
            }else{
                $resultado->execute();
            };
            return $resultado->fetch();
        } catch (Exception $e) {
            return false;
        }
    }
}
?>