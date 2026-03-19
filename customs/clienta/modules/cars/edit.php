<?php
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$cars = json_decode(file_get_contents(ROOT . '/data/cars.json'), true);
$car = null;
foreach ($cars as $c) {
    if ($c['id'] === $id && $c['customer'] === 'clienta') { $car = $c; break; }
}
if (!$car) { echo '<p>Voiture introuvable.</p>'; return; }
?>
<button onclick="loadModule('cars','ajax')">Retour</button>
<h2><?= htmlspecialchars($car['modelName']) ?></h2>
<ul>
    <li><strong>Marque :</strong> <?= htmlspecialchars($car['brand']) ?></li>
    <li><strong>Annee :</strong> <?= date('Y', $car['year']) ?></li>
    <li><strong>Puissance :</strong> <?= $car['power'] ?> ch</li>
    <li><strong>Couleur :</strong>
        <span style="display:inline-block;width:20px;height:20px;background:<?= htmlspecialchars($car['colorHex']) ?>;border:1px solid #000;vertical-align:middle"></span>
        <?= htmlspecialchars($car['colorHex']) ?>
    </li>
    <li><strong>Garage ID :</strong> <?= $car['garageId'] ?></li>
</ul>