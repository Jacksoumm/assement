<?php
$cars = json_decode(file_get_contents(ROOT . '/data/cars.json'), true);
$clientCars = array_filter($cars, fn($c) => $c['customer'] === 'clienta');
$currentYear = (int) date('Y');
?>
<h1>Voitures Client A</h1>
<ul>
<?php foreach ($clientCars as $car):
    $year = (int) date('Y', $car['year']);
    $age = $currentYear - $year;
    if ($age > 10)    $color = 'color:red';
    elseif ($age < 2) $color = 'color:green';
    else              $color = '';
?>
    <li onclick="loadModule('cars','edit',{id:<?= $car['id'] ?>})" style="cursor:pointer; <?= $color ?>">
        <strong><?= htmlspecialchars($car['modelName']) ?></strong>
        <?= htmlspecialchars($car['brand']) ?>
        <?= $year ?>
        <?= $car['power'] ?> chevaux
    </li>
<?php endforeach; ?>
</ul>