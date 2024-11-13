<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h3><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <?php if ($data['message']) { ?>
        <div class="row mt-3">
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <?= $data['message']; ?>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = '<?= URLROOT; ?>/magazijn/index';
            }, 4000);
        </script>
    <?php } else { ?>
        <div class="row mt-3">
            <div class="col-12">
                <h5>Product Informatie</h5>
                <p><strong>Naam:</strong> <?= $data['product']->Naam ?></p>
                <p><strong>Barcode:</strong> <?= $data['product']->Barcode ?></p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Naam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_null($data['allergenen'])) { ?>
                            <tr>
                                <td class='text-center'>Geen allergeneninformatie beschikbaar</td>
                            </tr>
                            <script>
                                setTimeout(function() {
                                    window.location.href = '<?= URLROOT; ?>/magazijn/index';
                                }, 4000);
                            </script>
                        <?php } else {                              
                            foreach ($data['allergenen'] as $allergeen) { ?>
                                <tr>
                                    <td><?= $allergeen->Naam ?></td>
                                </tr>
                            <?php } 
                        } ?>
                    </tbody>
                </table>
                <a href="<?= URLROOT; ?>/magazijn/index">Terug naar overzicht</a>
            </div>
        </div>
    <?php } ?>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>