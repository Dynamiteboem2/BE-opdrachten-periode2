<?php

class Leverancier extends BaseController
{
    private $leverancierModel;

    public function __construct()
    {
        // Laad het model voor leverancier
        $this->leverancierModel = $this->model('LeverancierModel');
    }

    public function index()
    {
        // Initialiseer data array voor de view
        $data = [
            'title' => 'Overzicht Leveranciers',
            'leveranciers' => NULL,
            'message' => NULL
        ];

        try {
            // Haal alle leveranciers en het aantal verschillende producten dat zij leveren op
            $result = $this->leverancierModel->getAllLeveranciers();

            if (empty($result)) {
                throw new Exception("Geen resultaten gevonden");
            }

            // Zet de opgehaalde data in de data array
            $data['leveranciers'] = $result;
        } catch (Exception $e) {
            // Log de fout en zet de foutmelding in de data array
            error_log($e->getMessage());
            $data['message'] = "Er is een fout opgetreden in de database: " . $e->getMessage();
        }

        // Laad de view met de data
        $this->view('leverancier/index', $data);
    }

    public function geleverdeProducten($leverancierId)
    {
        // Initialiseer data array voor de view
        $data = [
            'title' => 'Geleverde Producten',
            'producten' => NULL,
            'message' => NULL
        ];

        try {
            // Haal de geleverde producten van de specifieke leverancier op
            $result = $this->leverancierModel->getGeleverdeProducten($leverancierId);

            if (empty($result)) {
                throw new Exception("Geen resultaten gevonden");
            }

            // Zet de opgehaalde data in de data array
            $data['producten'] = $result;
        } catch (Exception $e) {
            // Log de fout en zet de foutmelding in de data array
            error_log($e->getMessage());
            $data['message'] = "Er is een fout opgetreden in de database: " . $e->getMessage();
        }

        // Laad de view met de data
        $this->view('leverancier/geleverdeProducten', $data);
    }
}