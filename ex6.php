<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT `title`, `performer`, `date`, `startTime` FROM `shows` ORDER BY `title`');

while ($donnees = $reponse->fetch()) {
?>
    <div>
        <?php
         echo '<i>' . $donnees['title'] . '</i> par <i>' . $donnees['performer'] . '</i>, le <i>' . $donnees['date'] . '</i> à <i>' . $donnees['startTime'] . '</i>.';
        ?>
    </div><br>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête
?>