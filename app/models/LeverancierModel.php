<?php

class LeverancierModel
{
    private $db;

    public function __construct()
    {
        // Initialiseer de database-verbinding
        $this->db = new Database();
    }

    public function getAllLeveranciers()
    {
        try {
            // SQL-query om alle leveranciers en het aantal verschillende producten dat zij leveren op te halen
            $sql = "CALL spGetAllLeveranciers()";
            $this->db->query($sql);
            // Voer de query uit en retourneer het resultaat
            return $this->db->resultSet();
        } catch (Exception $e) {
            // Log de fout en gooi een nieuwe uitzondering
            error_log("Fout in getAllLeveranciers: " . $e->getMessage());
            throw new Exception("Database query failed: " . $e->getMessage());
        }
    }

    public function getGeleverdeProducten($leverancierId)
    {
        try {
            // SQL-query om de geleverde producten van een specifieke leverancier op te halen
            $sql = "CALL spGetGeleverdeProducten(:leverancierId)";
            $this->db->query($sql);
            // Bind de parameter leverancierId aan de query
            $this->db->bind(':leverancierId', $leverancierId);
            // Voer de query uit en retourneer het resultaat
            return $this->db->resultSet();
        } catch (Exception $e) {
            // Log de fout en gooi een nieuwe uitzondering
            error_log("Fout in getGeleverdeProducten: " . $e->getMessage());
            throw new Exception("Database query failed: " . $e->getMessage());
        }
    }
}