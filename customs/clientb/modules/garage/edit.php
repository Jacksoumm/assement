<?php
$id      = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$garages = json_decode(file_get_contents(ROOT . '/data/garages.json'), true);
$cars    = json_decode(file_get_contents(ROOT . '/data/cars.json'),    true);
$garage  = null;
foreach ($garages as $g) {
    if ($g['id'] === $id && $g['customer'] === 'clientb') { $garage = $g; break; }
}
if (!$garage) { echo '<p>Garage introuvable.</p>'; return; }
$garageCars = array_filter($cars, fn($c) => $c['garageId'] === $id && $c['customer'] === 'clientb');
?>
<button onclick="loadModule('garage','ajax')">← Retour</button>
<h2><?= htmlspecialchars($garage['title']) ?></h2>
<p><strong>Adresse :</strong> <?= htmlspecialchars($garage['address']) ?></p>
<h3>Voitures dans le garage</h3>
<ul>
<?php foreach ($garageCars as $car): ?>
    <li><?= htmlspecialchars(strtolower($car['modelName'])) ?> <?= htmlspecialchars($car['brand']) ?></li>
<?php endforeach; ?>
</ul>