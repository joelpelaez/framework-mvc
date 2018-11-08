<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 07/11/2018
 * Time: 09:11 PM
 */

namespace App\Controller;


use App\Core\AppController;
use App\Model\CategoriaModel;

/**
 * Class CategoriasController
 * @package App\Controller
 */
class CategoriasController extends AppController
{
    public function __construct(){
        parent::__construct();
    }

    /**
     * Página inicial
     * @return mixed|void
     * @throws \Exception
     */
    public function index(){
        /** @var CategoriaModel $tareas */
        $tareas = $this->loadModel("categoria");
        $this->_view->categorias = $tareas->listarCategorias();

        $this->_view->title = "Página principal";
        $this->_view->renderizar("index");
    }

    /**
     * Permite agregar una categoria nueva.
     *
     * Permite la creación de una nueva categoria con la información requerida
     *
     * @throws \Exception
     */
    public function agregar() {
        if ($_POST) {
            /** @var CategoriaModel $tareas */
            $tareas = $this->loadModel("categoria");
            $this->_view->tareas = $tareas->add($_POST);
            $url = $this->redirect(['controller'=>'categorias']);
            $this->_messages->success('Categoria agregada correctamente', $url);
            return;
        }
        $this->_view->title = "Agregar";
        $this->_view->renderizar("agregar");
    }

    /**
     * Edita una categoria existente.
     *
     * Permite la edición de una categoria existente reescribiendo todos los datos
     * que la tarea contiene por el contenido actualizado.
     *
     * @param int $id El identificador único de la categoria, solo es necesario en petición GET.
     * @throws \Exception
     */
    public function editar($id = null) {
        if ($_POST) {
            /** @var CategoriaModel $categoriaModel */
            $categoriaModel = $this->loadModel("categoria");
            $categoriaModel->update($_POST);
            $this->_messages->success("Categoria editada correctamente", $this->redirect(['controller' => 'categorias']));
            return;
        }
        $id = (int) $id;
        /**
         * @var CategoriaModel $tareas
         */
        $categoriaModel = $this->loadModel("categoria");
        $this->_view->categoria = $categoriaModel->find($id);
        $this->_view->title = "Editar";
        $this->_view->renderizar("editar");
    }

    /**
     * Elimina una categoria.
     *
     * Permite eliminar una categoria del sistema. No realiza ninguna advertencia.
     *
     * @param int $id Identificador de la tarea.
     */
    public function eliminar($id) {
        /**
         * @var CategoriaModel $tarea
         */
        $tarea = $this->loadModel("categoria");
        $registro = $tarea->find($id);

        if (!empty($registro)) {
            $tarea->delete($id);
            $this->_messages->success("Categoria eliminada correctamente", $this->redirect(['controller' => 'categorias']));
            return;
        }
    }


}