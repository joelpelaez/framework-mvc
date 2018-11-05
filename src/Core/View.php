<?php

namespace App\Core;

use App\FlashMessages;

class View
{
    /**
     * @var AppController
     */
    private $_controlador;

    /**
     * @var FlashMessages
     */
    protected $_msg;

    /**
     * @var PageInfo
     */
    public $page;

    /**
     * @var AppError
     */
    public $error;

    /**
     * @var string
     */
    public $title;

    public $css_folder;

    public $js_folder;

    public $img_folder;

    /**
     * View constructor.
     * @param Request $peticion
     */
    public function __construct(Request $peticion){
        $this->_controlador = $peticion->getControlador();
        $this->_msg = new FlashMessages();
    }

    /**
     * @param $vista
     * @param bool $item
     * @throws \Exception
     */
    public function renderizar($vista, $item = false){
        $_layoutParams = array(
            "ruta_css"=>APP_URL."views/layouts/".DEFAULT_LAYOUT."/css/",
            "ruta_img"=>APP_URL."views/layouts/".DEFAULT_LAYOUT."/img/",
            "ruta_js"=>APP_URL."views/layouts/".DEFAULT_LAYOUT."/js/"
        );

        $rutaVista = ROOT."views".DS.$this->_controlador.DS.$vista.".phtml";

        if (is_readable($rutaVista)) {
            //include_once(ROOT."views".DS."layouts".DS.DEFAULT_LAYOUT.DS."header.php");
            $errors = false;
            $isBuffering = false;
            try {
                $isBuffering = ob_start();
                include_once($rutaVista);
                $output = ob_get_clean();
                $isBuffering = false;
                $this->css_folder = $_layoutParams['ruta_css'];
                $this->img_folder = $_layoutParams['ruta_img'];
                $this->js_folder = $_layoutParams['ruta_js'];
                $this->page = new PageInfo();
                $this->page->title = $this->title;
                $this->page->content = $output;
                include_once(ROOT . "views" . DS . "layouts" . DS . DEFAULT_LAYOUT . DS . "template.php");
            } catch (\Throwable $e) {
                if ($isBuffering)
                    ob_end_clean();
                $this->error = new AppError;
                $this->error->code = $e->getCode();
                $this->error->name = $e->getMessage();
                include_once(ROOT . "views" . DS . "layouts" . DS . DEFAULT_LAYOUT . DS . "errors.php");
            }
            //include_once(ROOT."views".DS."layouts".DS.DEFAULT_LAYOUT.DS."footer.php");
        }else{
            throw new \Exception("Vista no encontrada");
        }
    }
}
