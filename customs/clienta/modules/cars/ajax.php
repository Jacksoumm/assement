<?php
$cars = json_decode(file_get_contents(ROOT . '/data/cars.json'), true);
$clientCars = array_filter($cars, fn($c) => $c['customer'] === 'clienta');
?>
<h1>Voitures Client A</h1>
<ul>
<?php foreach ($clientCars as $car): ?>
    <li>
        <strong><?= htmlspecialchars($car['modelName']) ?></strong>
        <?= htmlspecialchars($car['brand']) ?>
        <?= date('Y', $car['year']) ?>
        <?= $car['power'] ?> chevaux
    </li>
<?php endforeach; ?>
</ul>