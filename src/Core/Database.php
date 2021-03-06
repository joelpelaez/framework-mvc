<?php

namespace App\Core;

use \PDO;

/**
 * Class Database
 *
 * Clase de conexión a la base de datos. Los cambios de los parametros estan
 * en el archivo index.php
 *
 * @package App\Core
 */
class Database extends PDO{

    /**
     * Database constructor.
     *
     * Define la inicialización de la conexión usando PDO como clase padre.
     */
    public function __construct(){
        parent::__construct(
            'mysql:host='.DB_HOST.';'.
            'dbname='.DB_NAME,
            DB_USER,
            DB_PASS,
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.DB_CHAR
            )
        );
    }
}
