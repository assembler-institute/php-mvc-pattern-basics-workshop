
<?php

class Errors extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->message = "Error al cargar la consulta o no existe la página";
        $this->view->render('errors/index');
        // echo "<p>Error al cargar el recurso</p>";
    }
}
