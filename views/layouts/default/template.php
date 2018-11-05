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