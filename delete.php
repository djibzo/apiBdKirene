<?php
include 'db.php';

$idProduit =(int)$_GET['idProduit'];

// Requête SQL pour supprimer le produit
$sql = "DELETE FROM Produit WHERE idProduit = ?";
$params = array($idProduit);

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}
echo json_encode(array("message" => "Produit supprime avec succes"));

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
