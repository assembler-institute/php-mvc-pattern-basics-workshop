<?php

class Newmodel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // CRUD

    public function insert($data)
    {
        // insertar datos en la base de datos

        try {
            $query = $this->db->connect()->prepare("INSERT INTO STUDENTS(STUDENT_REGISTER, FIRST_NAME, LAST_NAME) VALUES(:student_register, :first_Name, :last_Name)");
            $query->execute(["student_register" => $data["student_register"]], ["first_Name" => $data["first_name"]], ["last_Name" => $data["last_name"]]);
            return true;
        } catch (PDOException $e) {
            // echo "Already exists this student registred number";
            return false;
        }
    }
}
