<?php require APPROOT . '/views/includes/header.php'; ?>
<a href="<?= URLROOT; ?>/leverancier/geleverdeProducten" class="btn btn-light"><i class="fa fa-backward"></i> Terug</a>
<div class="card card-body bg-light mt-5">
    <h2>Nieuwe levering</h2>
    <form action="<?= URLROOT; ?>/levering/nieuweLevering/<?= $data['id']; ?>" method="post">
        <div class="form-group">
            <label for="aantal">Aantal producteenheden: <sup>*</sup></label>
            <input type="number" name="aantal" class="form-control form-control-lg <?= (!empty($data['aantal_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['aantal']; ?>">
            <span class="invalid-feedback"><?= $data['aantal_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="datum">Datum eerstvolgende levering: <sup>*</sup></label>
            <input type="date" name="datum" class="form-control form-control-lg <?= (!empty($data['datum_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['datum']; ?>">
            <span class="invalid-feedback"><?= $data['datum_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Sla op">
    </form>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>