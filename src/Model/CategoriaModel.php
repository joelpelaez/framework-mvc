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

    /**
     * Obtener una tarea por su identificador.
     *
     * Obtiene un array asociativo con la información consultada.
     *
     * @param $id
     * @return mixed
     */
    public function find($id) {
        $tarea = $this->_db->prepare(
            "SELECT * FROM categorias WHERE id = :id"
        );
        $tarea->bindParam("id", $id);
        $tarea->execute();
        return $tarea->fetch();
    }

    /**
     * Agrega una nueva tarea
     *
     * @param array $datos Información de la nueva tarea.
     *
     * @return bool
     */
    public function add($datos = array()) {
        $consulta = $this->_db->prepare(
            "INSERT INTO categorias (nombre) VALUES(:nombre)"
        );
        $consulta->bindParam(":nombre", $datos["nombre"]);

        return $consulta->execute();
    }

    /**
     * Actualiza los datos de una tarea.
     *
     * Actualiza cada uno de los campos del registro de la base de datos.
     *
     * @param array $datos Datos de la tarea actualizada.
     * @return bool Es true si los datos se actualizaron de forma correcta.
     */
    public function update($datos = array()) {
        $consulta = $this->_db->prepare(
            "UPDATE categorias SET nombre = :nombre WHERE id = :id"
        );
        $consulta->bindParam(":nombre", $datos["nombre"]);
        $consulta->bindParam(":id", $datos['id']);

        return $consulta->execute();
    }

    /**
     * Elimina una categoria
     *
     * Elimina un registro de categoria de la base de datos. No es reversible.
     *
     * @param $id
     * @return bool
     */
    public function delete($id) {
        $tarea = $this->_db->prepare(
            "DELETE FROM categorias WHERE id = :id"
        );
        $tarea->bindParam(":id", $id);

        if ($tarea->execute()) {
            return true;
        } else {
            return false;
        }
    }
}