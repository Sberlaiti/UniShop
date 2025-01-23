<?php 
    function verify_promoCode($pdo, $idUtilisateur, $promoCode) {
        $promoCode = strtoupper($promoCode);

        $sql_requete = "SELECT coefficient FROM promotion WHERE codePromo = :codePromo AND idUtilisateur = :idUtilisateur";
        $stmt = $pdo->prepare($sql_requete);
        $stmt->execute(['codePromo' => $promoCode, 'idUtilisateur' => $idUtilisateur]);
        $promo = $stmt->fetch();
        
        if ($promo) {
            return $promo['coefficient'];
        } else {
            return -1;
        }
    }
?>