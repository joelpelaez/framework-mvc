<?php

namespace App\Core;

/**
 * Class PageInfo
 *
 * Información estructurada enviada atraves de la clase {@see View}
 *
 * @see View
 * @package App\Core
 */
class PageInfo
{
    /**
     * @var string Título de la página.
     */
    public $title = "Content";

    /**
     * @var string Contenido de la página.
     */
    public $content = "";
}