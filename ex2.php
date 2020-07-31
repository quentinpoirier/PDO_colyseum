<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT `type` FROM `showtypes`');

while ($donnees = $reponse->fetch()) {
?>
    <div>
        <?php
         echo 'Type de spectacles: ' . $donnees['type'] . '<br>';
        ?>
    </div><br>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête
?>