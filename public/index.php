<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$pdo = App\Database::getConnection();

$stmt = $pdo->query('SELECT * FROM arret');
$arrets = $stmt->fetchAll();
?>

<ul>
<?php foreach ($arrets as $arret): ?>
   <li><?= htmlspecialchars($arret['nom']) ?></li>
<?php endforeach; ?>
</ul>