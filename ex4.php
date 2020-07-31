<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query
('SELECT * 
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
         echo 'Nom: ' . $donnees['lastName'] . '<br>';
         echo 'Prénom: ' . $donnees['firstName'] . '<br>';
         echo 'Date de naissance: ' . $donnees['birthDate'] . '<br>';
         echo 'Carte: ' . $donnees['card'] . '<br>';
         echo 'Numéro de carte: ' . $donnees['cardNumber'] . '<br>';
        ?>
    </div><br>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête
?>