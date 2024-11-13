<?php

class MagazijnModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllMagazijnProducts()
    {
        try {
            $sql = "CALL spReadMagazijnProduct()";
            $this->db->query($sql);
            return $this->db->resultSet();
        } catch (Exception $e) {
            error_log("Fout in getAllMagazijnProducts: " . $e->getMessage());
            throw new Exception("Database query failed: " . $e->getMessage());
        }
    }
}