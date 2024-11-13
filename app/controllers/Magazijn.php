<?php

class Magazijn extends BaseController
{
    private $magazijnModel;

    public function __construct()
    {
        $this->magazijnModel = $this->model('MagazijnModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Overzicht Magazijn Jamin',
            'message' => NULL,
            'messageColor' => NULL,
            'messageVisibility' => 'none',
            'dataRows' => NULL
        ];

        try {
            $result = $this->magazijnModel->getAllMagazijnProducts();

            if (empty($result)) {
                throw new Exception("Geen resultaten gevonden");
            }

            $data['dataRows'] = $result;
        } catch (Exception $e) {
            error_log($e->getMessage());
            $data['message'] = "Er is een fout opgetreden in de database: " . $e->getMessage();
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
        }

        $this->view('magazijn/index', $data);
    }

    public function leveringInfo($productId)
    {
        $data = [
            'title' => 'Levering Informatie',
            'leveringen' => NULL,
            'leverancier' => NULL
        ];

        try {
            $result = $this->magazijnModel->getLeveringInfoByProductId($productId);

            if (empty($result)) {
                throw new Exception("Geen leveringsinformatie gevonden");
            }

            $data['leveringen'] = $result;
            $data['leverancier'] = [
                'Naam' => $result[0]->LeverancierNaam,
                'Contactpersoon' => $result[0]->Contactpersoon,
                'Leveranciernummer' => $result[0]->Leveranciernummer,
                'Mobiel' => $result[0]->Mobiel
            ];
        } catch (Exception $e) {
            error_log($e->getMessage());
            $data['message'] = "Er is een fout opgetreden in de database: " . $e->getMessage();
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
        }

        $this->view('magazijn/leveringinfo', $data);
    }
}