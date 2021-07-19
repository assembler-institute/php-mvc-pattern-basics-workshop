<?php

class Newone extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->newMessage = "";
    }

    function render()
    {
        $this->view->render("newone/index");
    }

    function newStudent()
    {
        $studentRegister = $_POST["studentRegister"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $newMessage = "";

        if ($this->model->insert(["studentRegistert => $studentRegister", "firstName" => $firstName, "lastName" => $lastName])) {
            $newMessage = "New student registred";
        } else {
            $newMessage = "student already exists";
        }

        $this->view->newMessage = $newMessage;
        $this->render();
    }
}
