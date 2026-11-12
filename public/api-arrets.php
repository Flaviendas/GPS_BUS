<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$pdo = App\Database::getConnection();

$stmt = $pdo->query('SELECT * FROM arret');
$arrets = $stmt->fetchAll();
header('Content-Type: application/json');
foreach ($arrets as &$arret) {
    $arret['latitude'] = (float) $arret['latitude'];
    $arret['longitude'] = (float) $arret['longitude'];
}
unset($arret);
echo json_encode($arrets);
