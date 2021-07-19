<?php


class Request extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->students = [];
    }

    function render()
    {
        $students = $this->model->get();
        $this->view->students = $students;
        $this->view->render("request/index");
    }
}
