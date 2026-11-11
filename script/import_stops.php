<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$pdo = App\Database::getConnection();

$file = fopen(__DIR__ . '/../data/stops.txt', 'r');

$header = fgetcsv($file);
$stmt = $pdo->prepare('INSERT INTO arret (nom, type, longitude, latitude) VALUES (?, ?, ?, ?)');

while (($row = fgetcsv($file)) !== false) {
     if ($row[8] !== '0') {
        continue;
    }
    
    $stmt->execute([  $row[2],  'bus',  $row[5],  $row[4] ]);
}
fclose($file);