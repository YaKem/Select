<?php

	//	Connexion à la base de données
	try {
		$pdo = new PDO
		(
			'mysql:host=localhost;dbname=select',
			'root',
			'',
			[
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			]
		);
		$pdo->exec('SET NAMES UTF8');
	} catch(PDOException $e) {
		echo $e->getMessage();
	}
	
?>