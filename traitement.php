<?php
// Connexion à la base SQLite 
$db = new PDO('sqlite:db/message.db');

//Créér la table si elle n'existe pas 
$db->exect("CREATE TABLE IF NOT EXISTS message (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  nom TEXT,
  email TEXT,
  message TEXT,
  date_envoi DATETIME DEFAULT CURRENT_TIMESTAMP
  )");

//Récupération des données du formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];
$message = $_POST['message'];

//Insertion des données 
$stmt = $db->prepare("INSERT INTO messages (nom, email, message) VALUES (?,?, ?)");
$stmt->execute([$nom, $email, $message]);

echo "Message envoyé avec succès !";
?>