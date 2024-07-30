<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Requête SQL pour obtenir la liste des produits
$sql = "SELECT * FROM Produit"; // Remplacez par le nom de votre table des produits
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Tableau pour stocker les produits
$products = array();

// Parcourir toutes les lignes de résultat
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $products[] = $row;
}

// Encoder le tableau en JSON
echo json_encode($products);

// Libérer les ressources et fermer la connexion
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
    