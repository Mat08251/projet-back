<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet_back;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO user(pseudo, pass, email, nom) VALUES(:pseudo, :pass, :email, :nom)');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass,
    'email' => $email,
    'nom' => $nom     
));

echo 'vous vous êtes bien inscrit';
?>