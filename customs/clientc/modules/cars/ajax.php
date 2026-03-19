<?php
$cars = json_decode(file_get_contents(ROOT . '/data/cars.json'), true);
$clientCars = array_filter($cars, fn($c) => $c['customer'] === 'clientc');
?>
<h1>Voitures Client C</h1>
<ul>
<?php foreach ($clientCars as $car): ?>
    <li style="border-left:6px solid <?= htmlspecialchars($car['colorHex']) ?>; padding-left:8px; margin:4px 0">
        <strong><?= htmlspecialchars($car['modelName']) ?></strong>
        <?= htmlspecialchars($car['brand']) ?>
        <span style="display:inline-block;width:16px;height:16px;background:<?= htmlspecialchars($car['colorHex']) ?>;border:1px solid #000;vertical-align:middle"></span>
    </li>
<?php endforeach; ?>
</ul>