<?php
// Connexion à MySQL
$conn = new mysqli("localhost", "root", "", "reservation_hotel");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];

// Préparer la requête SQL
$sql = "INSERT INTO clients (nom, email, telephone) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nom, $email, $telephone);

// Exécuter et vérifier
if ($stmt->execute()) {
    echo "✅ Client ajouté avec succès !<br><a href='formulaire.php'>Retour</a>";
} else {
    echo "❌ Erreur : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
