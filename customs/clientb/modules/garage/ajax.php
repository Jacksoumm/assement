<?php
$garages = json_decode(file_get_contents(ROOT . '/data/garages.json'), true);
$clientGarages = array_filter($garages, fn($g) => $g['customer'] === 'clientb');
?>
<nav>
    <button onclick="loadModule('cars','ajax')">Voiture</button>
    <button onclick="loadModule('garage','ajax')">Garage</button>
</nav>
<h2>Garage du Client B</h2>
<ul>
<?php foreach ($clientGarages as $garage): ?>
    <li onclick="loadModule('garage','edit',{id:<?= $garage['id'] ?>})" style="cursor:pointer">
        <strong><?= htmlspecialchars($garage['title']) ?></strong>
        <?= htmlspecialchars($garage['address']) ?>
    </li>
<?php endforeach; ?>
</ul>