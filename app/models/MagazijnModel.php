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

    public function getProductVoorraad($productId)
    {
        try {
            $sql = "SELECT AantalAanwezig FROM Magazijn WHERE ProductId = :productId";
            $this->db->query($sql);
            $this->db->bind(':productId', $productId);
            return $this->db->single();
        } catch (Exception $e) {
            error_log("Fout in getProductVoorraad: " . $e->getMessage());
            throw new Exception("Database query failed: " . $e->getMessage());
        }
    }

    public function getAllergenenInfoByProductId($productId)
    {
        try {
            $sql = "SELECT a.* 
                    FROM Allergeen a
                    JOIN ProductPerAllergeen pa ON a.Id = pa.AllergeenId
                    WHERE pa.ProductId = :productId
                    ORDER BY a.Naam ASC";
            $this->db->query($sql);
            $this->db->bind(':productId', $productId);
            return $this->db->resultSet();
        } catch (Exception $e) {
            error_log("Fout in getAllergenenInfoByProductId: " . $e->getMessage());
            throw new Exception("Database query failed: " . $e->getMessage());
        }
    }

    public function getProductDetails($productId)
    {
        try {
            $sql = "SELECT Naam, Barcode FROM Product WHERE Id = :productId";
            $this->db->query($sql);
            $this->db->bind(':productId', $productId);
            return $this->db->single();
        } catch (Exception $e) {
            error_log("Fout in getProductDetails: " . $e->getMessage());
            throw new Exception("Database query failed: " . $e->getMessage());
        }
    }
}