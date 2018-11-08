<?php
/** @var \App\Core\View $this */
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $this->page->title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $this->css_folder; ?>/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= APP_URL ?>">MVC</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= APP_URL.'categorias' ?>">Categorías</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= APP_URL.'tareas' ?>">Tareas</a>
            </li>
        </ul>
    </div>
</nav>
    <div class="container">
        <?php if ($this->_msg->hasMessages()) { ?>
            <div class="row">
                <div class="col-12">
                    <?= $this->_msg->display(); ?>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-12">
                <?= $this->page->content ?>
            </div>
        </div>
    </div>
    <script src="<?= $this->js_folder; ?>/jquery-3.3.1.min.js"></script>
    <script src="<?= $this->js_folder; ?>/bootstrap.min.js"></script>
</body>
</html>