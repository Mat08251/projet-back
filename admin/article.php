<!DOCTYPE hmtl>
<html>
	<head>
		<meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<title>Mon super blog</title>
    
	</head>
    <body>
    	<h1 class="text-center">Mon super blog</h1>
    	<p class="text-center">Voici les derniers billets du blog</p>

<?php
//!connexion à la base de données//
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projet_back;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	die('Erreur :'.$e->getMessage());
}

$req = $bdd->query('SELECT id, titre, contenue, DATE_FORMAT(date, \'%d/%m/%y à %Hh%imin%ss\') AS date_creation_fr FROM article ORDER BY date DESC LIMIT 0,10');
	
while ($donnes = $req->fetch())
{
?>
<div class="message">
   <h3>
   	 <?php echo htmlspecialchars($donnes['titre']); ?>
   	 <em>le <?php echo $donnes['date_creation_fr']; ?></em>
   </h3>

   <p>
   <?php


      echo nl2br(htmlspecialchars($donnes['contenue']));
    ?>
    <br/>
    <em><a href="commentaire.php?billet=<?php echo $donnes['id']; ?>">commentaires</a></em>
    </p>
</div>
<?php
}
$req->closeCursor();
?>
</body>
</html>