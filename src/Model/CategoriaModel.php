<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 18/10/2018
 * Time: 08:41 AM
 */

namespace App\Model;


use App\Core\AppModel;

/**
 * Class CategoriaModel
 *
 * Clase modelo de las categorias
 *
 * @package App\Model
 */
class CategoriaModel extends AppModel
{
    /**
     * Obtiene una lista
     * @return array
     */
    public function listarCategorias() {
        return $this->_db->query("SELECT * FROM categorias")->fetchAll();
    }
}