<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT `lastName`, `firstName` FROM `clients` WHERE `lastName` LIKE "M%" ORDER BY `lastName`');

while ($donnees = $reponse->fetch()) {
?>
    <div>
        <?php
         echo '<strong>Nom:</strong> ' . $donnees['lastName'] . '<br>';
         echo '<strong>Prénom:</strong> ' . $donnees['firstName'] . '<br>';
        ?>
    </div><br>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête
?>