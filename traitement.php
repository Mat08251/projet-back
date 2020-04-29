<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet_back;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$pseudo = htmlspecialchars($_POST['pseudo']);
$pseudo = htmlspecialchars($_POST['pass']);
$pseudo = htmlspecialchars($_POST['email']);
$pseudo = htmlspecialchars($_POST['nom']);

if(!empty($_POST['pseudo']) AND !empty($_POST['pass']) AND !empty($_POST['email']) AND !empty($_POST['nom']))
{



$req = $bdd->prepare('INSERT INTO user(pseudo, pass, email, nom) VALUES(:pseudo, :pass, :email, :nom)');
$req->execute(array(
    'pseudo' => $_POST['pseudo'],
    'pass' => $_POST['pass'],
    'email' => $_POST['email'],
    'nom' => $_POST['nom']     
));


?>