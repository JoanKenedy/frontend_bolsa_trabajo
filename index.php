<?php

require_once "controllers/template.controller.php";
require_once "controllers/curl.controller.php";
require_once "controllers/usuarios.controller.php";


$index = new TemplateController();
$index->index();
