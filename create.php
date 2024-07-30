<?php
include 'db.php';

// Récupérer les données 
$CodeProduit = $_GET['CodeProduit'];
$DesignationProduit = $_GET['DesignationProduit'];
$PU = $_GET['PU'];
$QteMin = $_GET['QteMin'];
$QteCri = $_GET['QteCri'];
$CodeCategorie = $_GET['CodeCategorie'];

// Requête SQL pour insérer un nouveau produit
$sql = "INSERT INTO Produit (CodeProduit, DesignationProduit, PU, QteMin, QteCri, CodeCategorie) VALUES (?, ?, ?, ?, ?, ?)";
$params = array($CodeProduit, $DesignationProduit, $PU, $QteMin, $QteCri, $CodeCategorie);

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo json_encode(array("message" => "Produit créé avec succès"));

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
