<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h3>Overzicht Leverancier Gegevens</h3>
        </div>
    </div>

    <?php if ($data['message']) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $data['message']; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($data['leverancier'])): ?>
        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Contactpersoon</th>
                            <th>Mobiel</th>
                            <th>Straat</th>
                            <th>Huisnummer</th>
                            <th>Stad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $data['leverancier']->Naam; ?></td>
                            <td><?= $data['leverancier']->Contactpersoon; ?></td>
                            <td><?= $data['leverancier']->Mobiel; ?></td>
                            <?php if ($data['leverancier']->AdresBericht): ?>
                                <td colspan="3"><?= $data['leverancier']->AdresBericht; ?></td>
                            <?php else: ?>
                                <td><?= $data['leverancier']->Straat; ?></td>
                                <td><?= $data['leverancier']->Huisnummer; ?></td>
                                <td><?= $data['leverancier']->Stad; ?></td>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-12 text-right">
            <a href="<?= URLROOT; ?>" class="btn btn-primary">Home</a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>