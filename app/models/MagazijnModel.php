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

    public function getLeveringInfoByProductId($productId)
    {
        try {
            $sql = "SELECT l.*, lv.Naam AS LeverancierNaam, lv.Contactpersoon, lv.Leveranciernummer, lv.Mobiel 
                    FROM ProductPerLeverancier l
                    JOIN Leverancier lv ON l.LeverancierId = lv.Id
                    WHERE l.ProductId = :productId
                    ORDER BY l.DatumLevering ASC";
            $this->db->query($sql);
            $this->db->bind(':productId', $productId);
            return $this->db->resultSet();
        } catch (Exception $e) {
            error_log("Fout in getLeveringInfoByProductId: " . $e->getMessage());
            throw new Exception("Database query failed: " . $e->getMessage());
        }
    }
}