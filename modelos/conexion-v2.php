<?php
class ConexionV2
{
    private static string $host = "147.135.1.109";
    private static string $usuario = "fccontad";
    private static string $pass = "l2WDJ3@@bI2_X4gVQ?112189";
    private static string $db = "fccontad_intranet_fc_dev";
    private static array $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //Para que acepte caracteres especiales
        PDO::MYSQL_ATTR_FOUND_ROWS => true, //Para poder saber el numero de filas afectadas en un UPDATE o DELETE
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Salta un PDOException ante cualquier error
    ];

    private ?PDO $connection = null;
    private PDOStatement|false|null $stmt = null;

    public function __construct()
    {
        $this->connection = new PDO(
            'mysql:host=' . self::$host . ';dbname=' . self::$db,
            self::$usuario,
            self::$pass,
            self::$options
        );
    }

    /**
     * Esta funcion retorna un array de array que contiene todos los resultados de la consulta SQL
     * 
     * @return mixed
     */
    public function getData(string $sql,  array $params = null): mixed
    {
        if ($this->execute($sql, $params)) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return null;
    }

    /**
     * Esta funcion retorna un array que contiene el resultado de la consulta SQL
     * Solo trae una fila
     * 
     * @return mixed
     */
    public function getDataSingle(string $sql,  array $params = null): mixed
    {
        if ($this->execute($sql, $params)) {
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }

        return null;
    }

    /**
     * Esta funcion es para cuando vas a hace una consulta que tendra una fila y una columna
     * Ejemplo: select count(*) AS cantidad FROM tabla;
     * @param string $sql Ejemplo: select count(*) AS cantidad FROM tabla
     * @param string $prop Del Ejemplo de la parametro $sql el $prop seria el Alias del count - cantidad
     * @return mixed
     */
    public function getDataSingleProp(string $sql, string $prop, array $params = null): mixed
    {
        if ($this->execute($sql, $params)) {
            if ($this->stmt->rowCount() > 0) {
                $data = $this->stmt->fetch(PDO::FETCH_ASSOC);
                return $data[$prop];
            }
        }

        return null;
    }

    /**
     * Se realiza un insert en la base de datos y se devuelve el id de la fila que se inserto
     * 
     * @return bool FALSE Si salio algo mal al realizar el insert
     * @return string El ID de la fila insertada
     */
    public function insert(string $sql, array $params = null): ?int
    {
        if ($this->execute($sql, $params)) {
            return $this->connection->lastInsertId();
        }

        return null;
    }

    /**
     * Se realiza un update o delete en la base de datos y retarna la cantidad de filas afectadas
     * 
     * @return bool FALSE Si salio algo mal al realizar el insert
     * @param int La cantidad de filas afectadas
     */
    public function updateOrDelete(string $sql, array $params = null): ?int
    {
        if ($this->execute($sql, $params)) {
            return $this->stmt->rowCount();
        }
        return null;
    }

    /**
     * Ejecuta el SQL junto con los parametros de la consulta
     * 
     * @return bool True si se pudo ejecutar correctamente la consulta, False hubo algun error al ejecutar la consulta
     */
    public function execute(string $sql, array $params = null): bool
    {
        $this->stmt = $this->connection->prepare($sql);

        return $this->stmt->execute($params);
    }

    /**
     * Cierra la conexion con la base de datos
     */
    public function close(): void
    {
        $this->stmt = null;
        $this->connection = null;
    }
}
