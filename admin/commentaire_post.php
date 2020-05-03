<?php
if (isset($_POST['auteur']) AND isset($_POST['commentaire_user']) AND isset($_POST['id_billet']))
{
    try
    {
        
        $bdd = new PDO('mysql:host=localhost;dbname=projet_back', 'root', '', $pdo_options);
     
        $req = $bdd->prepare('INSERT INTO commentaire(auteur, commentaire_user, date_commentaire, id_billet ) VALUES(?, ?, NOW(),? )');
        $req->execute(array($_POST['auteur'], $_POST['commentaire_user'],$_POST['id_billet'] ));
         
        header('Location: commentaire.php?billet='.$_POST['id_billet'].'');
    }
     
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
