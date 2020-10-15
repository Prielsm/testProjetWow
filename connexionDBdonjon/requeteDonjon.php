<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "./config/db.php";

        try {
            $db = new PDO (DBDRIVER.': host='.DBHOST.';port='.DBPORT.';dbname='.DBNAME.
            ';charset='.DBCHARSET, DBUSER, DBPASS);
        } catch (Exception $e) {
            echo "Il y a eu une erreur dans la connexion de la base de données.";
        }

        // récupérer la table donjon
        $sql = "SELECT * FROM donjon";
        $stmt =$db->prepare($sql);
        $stmt->execute();
        $arrayResultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        var_dump($arrayResultat);

        // récupérer tous les boss
        $sql = "SELECT * FROM bossdonjon";
        $stmt =$db->prepare($sql);
        $stmt->execute();
        $arrayResultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        var_dump($arrayResultat);

        // récupérer les butins du boss ayant l'id 4
        $sql = "SELECT * FROM butindonjon WHERE id_boss = '4'";
        $stmt =$db->prepare($sql);
        $stmt->execute();
        $arrayResultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        var_dump($arrayResultat);


        // récupérer l'id et le nom du butin, le nom du boss et le nom du donjon
        $sql = "SELECT butindonjon.id, butindonjon.nom, bossdonjon.nom as nomBoss, donjon.nom as nomDonjon FROM butindonjon INNER JOIN bossdonjon ON butindonjon.id_boss = bossdonjon.id INNER JOIN donjon ON bossdonjon.id_donjon = donjon.id";
        $stmt =$db->prepare($sql);
        $stmt->execute();
        $arrayResultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        var_dump($arrayResultat);


    ?>

</body>
</html>