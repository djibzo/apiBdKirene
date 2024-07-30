<?php
include 'db.php';

// Vérifier si l'identifiant du produit est fourni dans les paramètres de la requête
if (isset($_GET['idProduit'])) {
    $idProduit = $_GET['idProduit'];

    // Requête SQL pour obtenir les détails du produit
    $sql = "SELECT * FROM Produit WHERE idProduit = ?";
    $params = array($idProduit);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Vérifier si le produit existe
    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Renvoie les détails du produit en JSON
        echo json_encode($row);
    } else {
        // Produit non trouvé
        echo json_encode(array("message" => "Produit non trouve"));
    }

    sqlsrv_free_stmt($stmt);
} else {
    // Identifiant du produit non fourni
    echo json_encode(array("message" => "idProduit non fourni"));
}

sqlsrv_close($conn);
?>
