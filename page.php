<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="./css/style.css" />
        <script type='text/javascript' src='./jquery-2.0.3.min.js'></script>
        <script type='text/javascript' src='./web.js'></script>

        <title>chat</title>

    </head>

    <style>

    form

    {

        text-align:center;

    }

    </style>

    <body>



    <form action="chatmessage.php" method="post">

        <p>

        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" />

        <label for="message">Message</label> :  <input type="text" name="message" id="msg" />

        <input type="submit" value="▲" id="submit" />

    </p>

    </form>

<div class = zonemessage>

    <?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=proxichat;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>
</div>
