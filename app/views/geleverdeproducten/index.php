<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h3>Overzicht Geleverde Producten</h3>
        </div>
    </div>

    <form action="<?= URLROOT; ?>/geleverdeproducten/index" method="post">
        <div class="row mt-3">
            <div class="col-6">
                <label for="startdatum">Startdatum:</label>
                <input type="date" id="startdatum" name="startdatum" class="form-control" required>
            </div>
            <div class="col-6">
                <label for="einddatum">Einddatum:</label>
                <input type="date" id="einddatum" name="einddatum" class="form-control" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-primary">Maak selectie</button>
            </div>
        </div>
    </form>

    <?php if (!empty($data['producten'])): ?>
        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Leverancier</th>
                            <th>Contactpersoon</th>
                            <th>Productnaam</th>
                            <th>Totaal Geleverd</th>
                            <th>Specificatie</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['producten'] as $product): ?>
                            <tr>
                                <td><?= $product->LeverancierNaam; ?></td>
                                <td><?= $product->Contactpersoon; ?></td>
                                <td><?= $product->ProductNaam; ?></td>
                                <td><?= $product->TotaalGeleverd; ?></td>
                                <td><a href="#"><img src="<?= URLROOT; ?>/img/questionmark.png" alt="Info" style="width: 20px; height: 20px;"></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div class="row mt-3">
            <div class="col-12">
                <p>Er zijn geen geleverde producten gevonden.</p>
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