<?php

class TemplateController
{

    public function index()
    {
        include "views/template.php";
    }


    static public function path()
    {
        return "http://prueba_bolsa_de_trabajo.com/";
    }
}
