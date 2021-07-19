<?php

include_once "models/student.php";

class Requestmodel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // CRUD

    public function get()
    {
        // Get data to our bd

        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM Students");
            while ($row = $query->fetch()) {
                $item = new Student();
                $item->student_register = $row['student_register'];
                $item->first_name = $row['first_name'];
                $item->last_name = $row['last_name'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
}
