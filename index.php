<?php

require_once 'StartSmarty.php';
require_once 'Autoload.php';
$fcontroller = new CFrontController();
$fcontroller->run($_SERVER['REQUEST_URI']);