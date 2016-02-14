<?php

try {
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=symfony;charset=utf8', 'root', 'root');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

echo "OK" . PHP_EOL;
