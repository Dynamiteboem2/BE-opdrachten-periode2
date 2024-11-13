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
            'leverancier' => NULL,
            'message' => NULL
        ];

        try {
            $voorraad = $this->magazijnModel->getProductVoorraad($productId);

            if ($voorraad->AantalAanwezig == 0) {
                $data['message'] = "Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: 30-04-2023";
                header("refresh:4;url=" . URLROOT . "/magazijn/index");
            } else {
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
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            $data['message'] = "Er is een fout opgetreden in de database: " . $e->getMessage();
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
        }

        $this->view('magazijn/leveringinfo', $data);
    }

    public function allergenenInfo($productId)
    {
        $data = [
            'title' => 'Overzicht Allergenen',
            'allergenen' => NULL,
            'product' => NULL,
            'message' => NULL
        ];

        try {
            $productDetails = $this->magazijnModel->getProductDetails($productId);
            if (!$productDetails) {
                throw new Exception("Geen productinformatie gevonden");
            }

            $result = $this->magazijnModel->getAllergenenInfoByProductId($productId);

            if (empty($result)) {
                $data['message'] = "In dit product
zitten geen stoffen die een allergische reactie kunnen veroorzaken";
            } else {
                $data['allergenen'] = $result;
            }

            $data['product'] = $productDetails;
        } catch (Exception $e) {
            error_log($e->getMessage());
            $data['message'] = "Er is een fout opgetreden in de database: " . $e->getMessage();
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
        }

        $this->view('magazijn/allergeneninfo', $data);
    }
}