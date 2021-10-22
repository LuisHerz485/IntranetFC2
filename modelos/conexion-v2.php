<?php
class ConexionV2
{
    private static string $host = "147.135.1.109";
    private static string $usuario = "fccontad";
    private static string $pass = "l2WDJ3@@bI2_X4gVQ?1121";
    private static string $db = "fccontad_intranet_fc_dev";
    private static array $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::MYSQL_ATTR_FOUND_ROWS => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
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

    public function getData(string $sql,  array $params = null): mixed
    {
        if ($this->execute($sql, $params)) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return null;
    }

    public function getDataSingle(string $sql,  array $params = null): mixed
    {
        if ($this->execute($sql, $params)) {
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }

        return null;
    }

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

    public function insert(string $sql, array $params = null): ?int
    {
        if ($this->execute($sql, $params)) {
            return $this->connection->lastInsertId();
        }

        return null;
    }

    public function updateOrDelete(string $sql, array $params = null): ?int
    {
        if ($this->execute($sql, $params)) {
            return $this->stmt->rowCount();
        }
        return null;
    }

    public function execute(string $sql, array $params = null): bool
    {
        $this->stmt = $this->connection->prepare($sql);

        return $this->stmt->execute($params);
    }

    public function close(): void
    {
        $this->stmt = null;
        $this->connection = null;
    }
}
