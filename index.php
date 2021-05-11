<?php
require('./templates/header.php');
$homeController = new App\controller\HomeController();

$homeController->index();
