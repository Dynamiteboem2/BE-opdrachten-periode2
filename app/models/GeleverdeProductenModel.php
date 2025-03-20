<?php
class GeleverdeProductenModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getGeleverdeProducten($startdatum = null, $einddatum = null) {
        $query = '
            SELECT l.Naam AS LeverancierNaam, l.Contactpersoon, p.Naam AS ProductNaam, SUM(pl.Aantal) AS TotaalGeleverd
            FROM product p
            JOIN productperleverancier pl ON p.Id = pl.ProductId
            JOIN leverancier l ON l.Id = pl.LeverancierId
        ';

        if ($startdatum && $einddatum) {
            $query .= ' WHERE pl.DatumLevering BETWEEN :startdatum AND :einddatum';
        }

        $query .= ' GROUP BY l.Naam, l.Contactpersoon, p.Naam ORDER BY l.Naam ASC';

        $this->db->query($query);

        if ($startdatum && $einddatum) {
            $this->db->bind(':startdatum', $startdatum);
            $this->db->bind(':einddatum', $einddatum);
        }

        return $this->db->resultSet();
    }
}