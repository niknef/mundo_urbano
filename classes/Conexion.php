<?PHP

/**
 * Clase para la conexión de PDO al proyecto
 */
class Conexion{
    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASS = '';
    private const DB_NAME = 'mundo_urbano';
    private const DB_DSN = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8mb4';

    private PDO $db;

    /**
     * Obtiene una conexión a la base de datos utilizando PDO.
     *
     * @return PDO Objeto de conexión PDO a la base de datos.
     *
     * @throws Exception Si ocurre un error al intentar establecer la conexión, se detiene el script con un mensaje de error.
     * Funcionamiento:
     *  - La función intenta crear una nueva instancia de `PDO` usando el DSN, usuario y contraseña definidos.
     *  - Si la conexión falla, captura la excepción y muestra un mensaje de error, luego detiene la ejecución.
     *  - Si la conexión es exitosa, devuelve el objeto PDO para su uso en operaciones de base de datos.
     */
    public function getConexion():PDO
    {
        try {
            $this->db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
        } catch (Exception $e) {
            echo 'Error al conectar con la base de datos: ';
            die();
        }
        return $this->db;
    }
}