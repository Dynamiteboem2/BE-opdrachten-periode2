<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <!-- Titel van de pagina -->
            <h3><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <?php if ($data['message']) { ?>
        <div class="row mt-3">
            <div class="col-12">
                <!-- Foutmelding weergeven -->
                <div class="alert alert-danger" role="alert">
                    <?= $data['message']; ?>
                </div>
            </div>
        </div>
        <script>
            // Redirect na 3 seconden
            setTimeout(function() {
                window.location.href = '<?= URLROOT; ?>/leverancier/index';
            }, 3000);
        </script>
    <?php } else { ?>
        <div class="row mt-3">
            <div class="col-12">
                <!-- Tabel met geleverde producten -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Aantal in Magazijn</th>
                            <th>Verpakkingseenheid</th>
                            <th>Datum Laatste Levering</th>
                            <th>Nieuwe Levering</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_null($data['producten'])) { ?>
                            <tr>
                                <td colspan='5' class='text-center'>Geen geleverde producten beschikbaar</td>
                            </tr>
                        <?php } else {                              
                            foreach ($data['producten'] as $product) { ?>
                                <tr>
                                    <td><?= $product->Naam ?></td>
                                    <td><?= $product->AantalAanwezig ?></td>
                                    <td><?= $product->VerpakkingsEenheid ?></td>
                                    <td><?= date('d-m-Y', strtotime($product->DatumLaatsteLevering)) ?></td>
                                    <td class='text-center'>
                                        <!-- Knop voor nieuwe levering -->
                                        <a href='<?= URLROOT . "/levering/nieuweLevering/$product->Id" ?>' class='btn btn-success'>
                                            <i class='bi bi-plus-lg'></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } 
                        } ?>
                    </tbody>
                </table>
                <a href="<?= URLROOT; ?>/leverancier/index">Terug naar overzicht</a>
            </div>
        </div>
    <?php } ?>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>