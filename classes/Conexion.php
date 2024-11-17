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

    // Variable para almacenar la conexión PDO
    private static ?PDO $db = null;

    /**
     * Método estático para establecer la conexión con la base de datos.
     *
     * Este método intenta crear una instancia de la clase PDO para establecer
     * la conexión con la base de datos utilizando las constantes de configuración
     * definidas en la clase (`DB_DSN`, `DB_USER`, `DB_PASS`)
     */
    public static function conectar()
    {
        try {
            self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
        } catch (Exception $e) {
            die('Error al conectar con la base de datos');
        }
    }

    /**
     * Función que devuelve una conexión PDO lista para usar
     * @return PDO
     */
    public static function getConexion():PDO
    {
        if (self::$db === null) {
            self::conectar();
        }
        return self::$db;
    }

    
}