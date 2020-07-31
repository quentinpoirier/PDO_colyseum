<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query
('SELECT `lastName`, `firstName`, `birthDate`, `cards`.`cardNumber`,
CASE
    WHEN `clients`.`card` = 1 THEN "oui"
    WHEN `clients`.`card` = 0 THEN "non"
END AS "carte de fidélité"
FROM `clients`
LEFT JOIN `cards`
ON `clients`.`cardNumber` = `cards`.`cardNumber`
INNER JOIN `cardtypes`
ON `cards`.`cardTypesId` = `cardtypes`.`id`
WHERE `cardtypes`.`id` = 1');

while ($donnees = $reponse->fetch()) {
?>
    <div>
        <?php
        echo '<strong>Nom:</strong> ' . $donnees['lastName'] . '<br>';
        echo '<strong>Prénom:</strong> ' . $donnees['firstName'] . '<br>';
        echo '<strong>Date de naissance:</strong> ' . $donnees['birthDate'] . '<br>';
        echo '<strong>Carte:</strong> ' . $donnees['carte de fidélité'] . '<br>';
        if ($donnees['carte de fidélité'] == "non") {
            echo '';
        } else {
            echo '<strong>Numéro de carte:</strong> ' . $donnees['cardNumber'] . '<br>';
        }
        
        ?>
    </div><br>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête
?>