<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: POST');

require_once "controllers/template.controller.php";
require_once "controllers/curl.controller.php";
require_once "controllers/usuarios.controller.php";
require_once "controllers/recruiter.controller.php";
require_once "librerias/vendor/autoload.php";



$index = new TemplateController();
$index->index();