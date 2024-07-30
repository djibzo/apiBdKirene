<?php
include 'db.php';

// Récupérer les données 
$idProduit = $_GET['idProduit'];
$CodeProduit = $_GET['CodeProduit'];
$DesignationProduit = $_GET['DesignationProduit'];
$PU = $_GET['PU'];
$QteMin = $_GET['QteMin'];
$QteCri = $_GET['QteCri'];
$CodeCategorie = $_GET['CodeCategorie'];

// Requête SQL pour mettre à jour le produit
$sql = "UPDATE Produit SET CodeProduit = ?, DesignationProduit = ?, PU = ?, QteMin = ?, QteCri = ?, CodeCategorie = ? WHERE idProduit = ?";
$params = array($CodeProduit, $DesignationProduit, $PU, $QteMin, $QteCri, $CodeCategorie, $idProduit);

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo json_encode(array("message" => "Produit mis à jour avec succès"));

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
