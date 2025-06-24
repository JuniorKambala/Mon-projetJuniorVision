<?php
// Connexion à la base de données 
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$base = "projjuniorvision";

//Connexion
$conn = new mysqli($serveur, $utilisateur, $motdepasse, $base);

//Vérifie la connexion
if ($conn->connect_error) {
  die("Échec de la connexion : " . $conn->connect_error); 
}

//Récupère les données du formulaire 
$nom = $_POST['nom'];
$email = $_POST['email'];
$message = $_POST['message'];

//Prépare et exécute la requête 
$sql = "INSERT INTO message (nom, email, message) VALUE (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $conn, $email, $message);

if ($stmt->execute()) {
   echo "Message envoyé avec succès !";
} else {
   echo "Erreur : " . $conn->error;
}

$stmt->close();
$conn->close();
?>