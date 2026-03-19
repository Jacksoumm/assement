<?php
$cars    = json_decode(file_get_contents(ROOT . '/data/cars.json'),    true);
$garages = json_decode(file_get_contents(ROOT . '/data/garages.json'), true);
$garageMap = array_column($garages, 'title', 'id');
$clientCars = array_filter($cars, fn($c) => $c['customer'] === 'clientb');
?>
<h1>Voitures Client B</h1>
<ul>
<?php foreach ($clientCars as $car): ?>
    <li>
        <strong><?= htmlspecialchars(strtolower($car['modelName'])) ?></strong>
        <?= htmlspecialchars($car['brand']) ?>
        <?= htmlspecialchars($garageMap[$car['garageId']] ?? 'N/A') ?>
    </li>
<?php endforeach; ?>
</ul>
