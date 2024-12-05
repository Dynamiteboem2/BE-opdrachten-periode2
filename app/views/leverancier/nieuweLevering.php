<?php require_once APPROOT . '/views/includes/header.php'; ?>

<a href="<?= URLROOT; ?>/leverancier/geleverdeProducten" class="btn btn-light"><i class="fa fa-backward"></i> Terug</a>
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h3>Nieuwe Levering</h3>
        </div>
    </div>

    <form action="<?= URLROOT; ?>/levering/nieuweLevering/<?= $data['id']; ?>" method="post">
        <div class="form-group">
            <label for="aantal">Aantal:</label>
            <input type="number" name="aantal" class="form-control <?= (!empty($data['aantal_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['aantal']; ?>">
            <span class="invalid-feedback"><?= $data['aantal_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="datum">Datum:</label>
            <input type="date" name="datum" class="form-control <?= (!empty($data['datum_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['datum']; ?>">
            <span class="invalid-feedback"><?= $data['datum_err']; ?></span>
        </div>
        <div class="form-group mt-3">
            <input type="submit" class="btn btn-success" value="Opslaan">
            <a href="<?= URLROOT; ?>/leverancier/geleverdeProducten/<?= $data['id']; ?>" class="btn btn-secondary">Annuleren</a>
        </div>
    </form>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>